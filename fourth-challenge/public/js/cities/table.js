
$(document).ready(function() {
    $('.delete-form').on('submit', function(e) {
        e.preventDefault();

        const formId = $(this).closest('form').attr('id');
        const parentRow = $(this).closest('tr');
        const formData = $('.delete-form').serialize();
        $.ajax({
            url: 'cities' + '/' + formId,
            type: 'DELETE',
            data: formData,
            success: function() {
                parentRow.remove();
            },
            error: function(xhr, status, error) {
                alert('Error: ' + error.message);
            }
        });
    });
});

$(document).ready(function () {
    $('#table-container').on('click', '.sort', function (e) {
        e.preventDefault();
        let column = $(this).data('column') || 'id';
        let direction = $(this).data('direction') || 'asc';

        direction = (direction === 'asc') ? 'desc' : 'asc';
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
                alert("Error when sorting");
            }
        });
    });
});

