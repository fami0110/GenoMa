document.addEventListener("DOMContentLoaded", function () {

    // DATATABLES INIT //

    $('#datatables').DataTable();


    // ADD BUTTON EVENT //

    $('.add-btn').on('click', () => {
        // Data config
        $('#formModal input[name="_method"]').val("POST");
        $('#cover').attr('required', true);
        $('#formModalLabel').text('Tambah Data');
        
        // Set action
        const form = $('#formModal form');
        form.attr('action', form.data('default-action'));

        // Reset Form
        $('#formModal form')[0].reset();
        resetFacility();
    });


    // EDIT BUTTON EVENT //

    let apiCache = {};

    $('.edit-btn').on('click', function() {
        // Data config
        $('#formModal input[name="_method"]').val("PUT");
        $('#cover').attr('required', false);
        $('#formModalLabel').text('Ubah Data');
        const id = $(this).data('id');

        // Set action
        const form = $('#formModal form');
        form.attr('action', form.data('default-action') + `/${id}`);

        // Reset Form
        $('#formModal form')[0].reset();
        resetFacility(true);

        const setFields = (data) => {
            $('#name').val(data.name);
            $('#category').val(data.category);
            $('#description').val(data.description);
            
            let facilities = JSON.parse(data.facilities);
            for (let facility of facilities)
                addFacility(facility);

            $('#address').val(data.address);
            $('#link').val(data.link);
            $('#longitude').val(data.longitude);
            $('#latitude').val(data.latitude);
            $('#price_min').val(data.price_min);
            $('#price_max').val(data.price_max);
            $('#is_recomended').attr('checked', Boolean(data.is_recomended));
            $('#rate').val(data.rate);
        }

        if (id in apiCache) {
            setFields(apiCache[id]);
        } else {
            fetch(`/admin/tourism/${id}/get`)
                .then((response) => {
                    if (!response.ok) throw Error(response.statusText); 
                    return response.json();
                }).then(data => {
                    apiCache[id] = data;
                    setFields(data);
                });
        }
    });

    // DELETE BUTTON EVENT
    
    $('.delete-btn').on('click', function() {
        const form = $(this)[0].closest('form');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
        })
        .then((res) => {
            if (res.isConfirmed)
                form.submit();
        });
    });


    // IMG SLIDER EVENT

    $('.slider-btn').on('click', function() {
        
        const id = $(this).data('id');
        const URL_STORAGE = $('#imgModal').data('url-storage') + "/";
        
        const updateSlider = (photos) => {
            console.log('b');
            let index = 0;

            $('#img-slider .modal-body').html(`
                <div id="img-slider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators"></div>
                    <div class="carousel-inner rounded-3"></div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#img-slider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#img-slider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            `);

            $('#img-slider .carousel-indicators').html(`
                <button type="button" data-bs-target="#img-slider" data-bs-slide-to="${index}" class="active" aria-current="true"></button>
            `);

            $('#img-slider .carousel-inner').html(`
                <div class="carousel-item active">
                    <img src="${URL_STORAGE + photos[0]}" class="d-block w-100 object-fit-cover" style="height: 500px;" alt="...">
                </div>
            `);

            photos.shift();
            index++;

            for (let photo of photos) {
                $('#img-slider .carousel-indicators').append(`
                    <button type="button" data-bs-target="#img-slider" data-bs-slide-to="${index}"></button>
                `);
    
                $('#img-slider .carousel-inner').append(`
                    <div class="carousel-item">
                        <img src="${URL_STORAGE + photo}" class="d-block w-100 object-fit-cover" style="height: 500px;" alt="...">
                    </div>
                `);
                index++;
            }
        };

        if (id in apiCache) {
            updateSlider(JSON.parse(apiCache[id].photos));
        } else {
            fetch(`/admin/tourism/${id}/get`)
                .then((response) => {
                    if (!response.ok) throw Error(response.statusText); 
                    return response.json();
                }).then(data => {
                    apiCache[id] = data;
                    updateSlider(JSON.parse(data.photos));
                });
        }
    });
    
    // DECIMAL INPUT

    $('.decimal-input').on('input', function() {
        const input = $(this);
        let sanitizedVal = input.val()
            .replace(/(?!^-)[^-0-9.]/g, '')  // Allow a minus sign only at the beginning
            .replace(/(\..*)\./g, '$1') // Ensure only one decimal point
            .replace(/^-+/g, '-') // Ensure only one minus sign at the beginning
            .replace(/(?!^)-/g, ''); // Prevent negative signs not at the beginning
    
        input.val(sanitizedVal);
    });



    // FACILITIES LOGIC //

    const facilities = document.querySelector('#facilities');

    function refreshEventFacilities() {
        // Delete Facilities
        facilities.querySelectorAll('button.delete-facility-btn').forEach(btn => {
            btn.onclick = () => {
                if (facilities.children.length > 1 ) {
                    btn.closest('.row').remove();
                    refreshEventFacilities();
                } else {
                    Swal.fire({
                        title: "Warning!",
                        text: "Facility required minimal 1 data!",
                        icon: "warning",
                    });
                }
            };
        });
    }

    // Add Facilities
    function addFacility(facility = null) {
        if (facilities.children.length >= 5) {
            Swal.fire({
                title: "Warning!",
                text: "Maximum day exceeded!",
                icon: "warning",
            });
            
            return 0;
        }

        let row = document.createElement("div");
        row.className = "row mb-3";

        row.innerHTML = `
            <div class="col-2 pe-1">
                <button type="button" class="btn btn-danger delete-facility-btn w-100">
                    <i class="bi bi-trash-fill"></i>
                </button>
            </div>
            <div class="col-10 ps-1">
                <input class="form-control" name="facilities[]" placeholder="Fasilitas" 
                    value="${ facility || '' }" required>
            </div>
        `;

        facilities.append(row);
        refreshEventFacilities();
    }
    document.querySelector("#add-facility-btn").onclick = () => {addFacility()};
    
    // Reset Facilities
    function resetFacility(clear = false) {
        facilities.innerHTML = (clear) ? "" : ` 
            <div class="row mb-3">
                <div class="col-2 pe-1">
                    <button type="button" class="btn btn-danger delete-facility-btn w-100">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </div>
                <div class="col-10 ps-1">
                    <input class="form-control" name="facilities[]" placeholder="Fasilitas" required>
                </div>
            </div>
        `;

        refreshEventFacilities();
    }
    document.querySelector("#reset-facility-btn").onclick = () => {resetFacility()};

    // Refresh Event when DOM Loaded 
    refreshEventFacilities();

});