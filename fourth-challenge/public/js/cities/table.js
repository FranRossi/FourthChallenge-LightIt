

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

$(document).ready(function () {
    console.log("Binding click event handler...");
    $('#table-container').on('click', '.sort', function (e) {
        e.preventDefault();
        let column = $(this).data('column');
        let direction = $(this).data('direction') || 'asc';

        direction = (direction === 'asc') ? 'desc' : 'asc';
        // console.log(direction);
        // console.log(column);
        $(this).data('direction', direction);

        $.ajax({
            url: "cities/sort",
            type: "GET",
            data: {
                column: column,
                direction: direction
            },
            success: function (data) {
                $('#table-container').html(data);
                const newPaginationHtml = $(data).find('#pagination-container').html();
                $('#pagination-container').html(newPaginationHtml);
            },
            error: function (xhr, error, status) {
                console.log("Error:", xhr);
                alert("Error al ordenar los datos");
            }
        });
    });
});

