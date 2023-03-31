

// delete city
$(document).ready(function() {
    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        // Get the id of the current form
        var formId = $(this).closest('form').attr('id');
        var parentRow = $(this).closest('tr');
        var formData = $('.delete-form').serialize();
        // Send an AJAX request to the server
        $.ajax({
            url: 'cities' + '/' + formId,
            type: 'DELETE',
            data: $('.delete-form').serialize(),
            success: function() {
                // Remove the deleted item from the list
                parentRow.remove();
            },
            error: function(xhr, status, error) {
                alert('Error: ' + error.message);
            }
        });
    });
});



