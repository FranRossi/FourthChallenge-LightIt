$(document).ready(function () {
    $('.dropdown-container').select2({
        ajax: {
            url: 'flights/cities',
            method: 'GET',
        }
    });
});



$(document).ready(function() {
    $('.delete-form').on('submit', function(e) {
        e.preventDefault();

        const formId = $(this).closest('form').attr('id');
        const parentRow = $(this).closest('tr');
        const token = document.querySelector("input[name='_token']").value;
        axios.delete('flights/' + formId, {
            headers: {
                'X-CSRF-TOKEN': token
            }
        })
            .then(response => {
                parentRow.remove();
            })
            .catch(error => {
                alert('Error: ' + error.message);
            });
    });
});
