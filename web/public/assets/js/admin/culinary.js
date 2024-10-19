document.addEventListener("DOMContentLoaded", function () {

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
        resetSchedule();
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
        resetSchedule(true);

        const setFields = (data) => {
            $('#name').val(data.name);
            $('#category').val(data.category);
            $('#description').val(data.description);

            let schedules = JSON.parse(data.schedules);
            for (let day in schedules)
                addShedule(day, schedules[day]['time-start'], schedules[day]['time-end']);

            $('#contact').val(data.contact);
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
            fetch(`/admin/culinary/${id}/get`)
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
            fetch(`/admin/culinary/${id}/get`)
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

    
    // SCHEDULES LOGIC //

    const schedules = document.querySelector('#schedules');

    function refreshEventSchedules() {
        // Delete Schedules
        schedules.querySelectorAll('button.delete-schedule-btn').forEach(btn => {
            btn.onclick = () => {
                if (schedules.children.length > 1 ) {
                    btn.closest('.row').remove();
                    refreshEventSchedules();
                } else {
                    Swal.fire({
                        title: "Warning!",
                        text: "Schedule required minimal 1 data!",
                        icon: "warning",
                    });
                }
            };
        });

        // Prevent double day input select
        let selects = schedules.querySelectorAll('select.day-input');
        let get_inputed_days = () => Array.from(selects).map(select => select.value);
        let day_values = ['mon', 'tue', 'web', 'thu', 'fri', 'sat', 'sun'];

        selects.forEach(select => {
            select.onchange = () => {
                let inputed_days = get_inputed_days();

                const index = inputed_days.indexOf(select.value);
                if (index > -1) inputed_days.splice(index, 1);
                
                if (inputed_days.includes(select.value)) {
                    Swal.fire({
                        title: "Warning!",
                        text: `That day was already in the schedule!`,
                        icon: "warning",
                    }).then(() => {
                        for (let day of day_values) {
                            if (!inputed_days.includes(day)) {
                                select.value = day;
                                break;
                            }
                        }
                    });
                }
            };
        });
    }

    // Add Schedule
    function addShedule(day = null, timeStart = null, timeEnd = null) {
        if (schedules.children.length >= 7) {
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
                <button type="button" class="btn btn-danger delete-schedule-btn w-100">
                    <i class="bi bi-trash-fill"></i>
                </button>
            </div>
            <div class="col-4 px-1">
                <select class="form-select day-input" name="day[]" required>
                    <option ${ (day === null) ? "selected" : "" } disabled>Pilih Hari</option>
                    <option value="mon" ${ (day === "mon") ? "selected" : "" }>Senin</option>
                    <option value="tue" ${ (day === "tue") ? "selected" : "" }>Selasa</option>
                    <option value="web" ${ (day === "web") ? "selected" : "" }>Rabu</option>
                    <option value="thu" ${ (day === "thu") ? "selected" : "" }>Kamis</option>
                    <option value="fri" ${ (day === "fri") ? "selected" : "" }>Jumat</option>
                    <option value="sat" ${ (day === "sat") ? "selected" : "" }>Sabtu</option>
                    <option value="sun" ${ (day === "sun") ? "selected" : "" }>Minggu</option>
                </select>
            </div>
            <div class="col-3 px-1">
                <input type="time" class="form-control" name="time-start[]" value="${ timeStart || "09:00"}" required>
            </div>
            <div class="col-3 ps-1">
                <input type="time" class="form-control" name="time-end[]" value="${ timeEnd || "17:00"}" required>
            </div>
        `;

        schedules.append(row);
        refreshEventSchedules();
    }
    document.querySelector("#add-schedule-btn").onclick = () => {addShedule()};
    
    // Reset Schedule
    function resetSchedule(clear = false) {
        schedules.innerHTML = (clear) ? "" : ` 
            <div class="row mb-3">
                <div class="col-2 pe-1 d-flex justify-content-end">
                    <button type="button" class="btn btn-danger delete-schedule-btn w-100">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </div>
                <div class="col-4 px-1">
                    <select class="form-select day-input" name="day[]" required>
                        <option selected disabled>Pilih Hari</option>
                        <option value="mon">Senin</option>
                        <option value="tue">Selasa</option>
                        <option value="web">Rabu</option>
                        <option value="thu">Kamis</option>
                        <option value="fri">Jumat</option>
                        <option value="sat">Sabtu</option>
                        <option value="sun">Minggu</option>
                    </select>
                </div>
                <div class="col-3 px-1">
                    <input type="time" class="form-control" name="time-start[]" value="09:00" required>
                </div>
                <div class="col-3 ps-1">
                    <input type="time" class="form-control" name="time-end[]" value="17:00" required>
                </div>
            </div>
        `;

        refreshEventSchedules();
    }
    document.querySelector("#reset-schedule-btn").onclick = () => {resetSchedule()};

    // Refresh Event when DOM Loaded 
    refreshEventSchedules();

    

    // DATATABLES INIT //

    $('#datatables').DataTable();
});