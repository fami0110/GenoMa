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

        const setFields = (data) => {
            $('#name').val(data.name);
            $('#category').val(data.category);
            $('#content').val(data.content);
            $('trix-editor').html(data.content);
        }

        if (id in apiCache) {
            setFields(apiCache[id]);
        } else {
            fetch(`/admin/cultures/${id}/get`)
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


    // IMG PEVIEW EVENT

    $('.img-btn').on('click', function() {
        const id = $(this).data('id');
        const URL_STORAGE = $('#imgModal').data('url-storage') + "/";
        $('#imgModal img').hide();

        const updatePreview = (cover) => {
            $('#imgModal img').attr('src', URL_STORAGE + cover);
            $('#imgModal img').show();
        };

        if (id in apiCache) {
            updatePreview(apiCache[id].cover);
        } else {
            fetch(`/admin/cultures/${id}/get`)
                .then((response) => {
                    if (!response.ok) throw Error(response.statusText); 
                    return response.json();
                }).then(data => {
                    apiCache[id] = data;
                    updatePreview(data.cover);
                });
        }
    });


    // MODAL CONTENT EVENT

    $('.content-btn').on('click', function() {
        const id = $(this).data('id');
        const URL_STORAGE = $('#imgModal').data('url-storage') + "/";

        const updateContent = (content) => {
            $('#contentModal .modal-body').html(content);
        };

        if (id in apiCache) {
            updateContent(apiCache[id].content);
        } else {
            fetch(`/admin/cultures/${id}/get`)
                .then((response) => {
                    if (!response.ok) throw Error(response.statusText); 
                    return response.json();
                }).then(data => {
                    apiCache[id] = data;
                    updateContent(data.content);
                });
        }
    });

});