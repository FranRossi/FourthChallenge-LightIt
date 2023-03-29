




// delete city

$(document).ready(function() {
    $('.delete-button').click(function(e) {
        e.preventDefault();

        // Send an AJAX request to the server
        $.ajax({
            url: $('.delete-form').attr('action'),
            type: 'DELETE',
            data: $('.delete-form').serialize(),
            success: function() {
                // Remove the deleted item from the list
                $('.delete-form').closest('tr').remove();


            }
        });
    });
});
