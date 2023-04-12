$(document).ready(function() {
    $('.create-form').on('submit', function(e) {
        e.preventDefault();

        const formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'cities',
            data: formData,
            success: function(data) {
                $('#table-container').html(data);
                const newPaginationHtml = $(data).find('#pagination-container').html();
                $('#pagination-container').html(newPaginationHtml);

                $('#new-Cities-name').val('');
            },
            error: function(xhr, status, error) {
                alert("City could not be added");
            }
        });
    });
});


$(document).ready(function() {
    $('.edit-form').on('submit', function(e) {
        e.preventDefault();

        let formData = $(this).serialize();
        let formId = $(this).closest('form').attr('id');
        $.ajax({
            type: 'PATCH',
            url: '/cities/' + formId,
            data: formData,
            success: function() {
                window.location.href = document.location.origin + '/cities';

            },
            error: function(xhr, status, error) {
                alert("City could not be edited");
            }
        });
    });
});


$(document).ready(function() {
    $('.cancel-button').click(function(e) {
        e.preventDefault();

        $.ajax({
            success: function() {
                window.location.href = document.location.origin + '/cities';
            }
        });
    });
});

