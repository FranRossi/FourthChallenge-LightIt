$(document).ready(function() {
    console.log("Creando una ciudad");
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

                // Reset the form inputs
                $('#new-city-name').val('');
                $('#flights-arriving').val('');
                $('#flights-departing').val('');
            },
            error: function(xhr, status, error) {
                // {{TODO - add error handling}}}
                alert("City could not be added");
            }
        });
    });
});



// Edit city
$(document).ready(function() {
    $('.edit-form').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        var formId = $(this).closest('form').attr('id');
        $.ajax({
            type: 'PATCH',
            url: 'cities/' + formId,
            data: formData,
            success: function(response) {
                // Redirect to previous URL
                window.location.href = document.referrer;

            },
            error: function(xhr, status, error) {
                // Do something on error
            }
        });
    });
});

$(document).ready(function() {
    $('.cancel-button').click(function(e) {
        e.preventDefault();

        $.ajax({
            success: function() {
                window.location.href = document.referrer;
            }
        });
    });
});

