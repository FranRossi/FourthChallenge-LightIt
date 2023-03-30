$(document).ready(function() {
    $('.create-form').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '/cities',
            data: formData,
            success: function(response) {
                // Clear the form inputs
                $('#name').val('');
                $('#flights_arriving').val('');
                $('#flights_departing').val('');

                // // Redirect to previous URL
                window.location.href = document.referrer;
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                console.log(error.message);
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
        console.log(formData);
        $.ajax({
            type: 'PATCH',
            url: '/cities/' + formId,
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

