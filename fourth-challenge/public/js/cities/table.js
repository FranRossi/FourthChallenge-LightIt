
// delete city
$(document).ready(function() {
    $('.delete-button').click(function(e) {
        e.preventDefault();

        // Get the id of the current form
        var formId = $(this).closest('form').attr('id');
        console.log(formId);
        var parentRow = $(this).closest('tr');
        // Send an AJAX request to the server
        $.ajax({
            url: 'cities' + '/' + formId,
            type: 'DELETE',
            data: $('.delete-form').serialize(),
            success: function() {
                // Remove the deleted item from the list
                parentRow.remove();
            }
        });
    });
});

