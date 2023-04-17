$(document).ready(function () {
    // $('.dropdown-container').select2({
    //     ajax: {
    //         url: 'cities',
    //         method: 'GET',
    //         processResults: function (data) {
    //             // Transforms the top-level key of the response object from 'items' to 'results'
    //             return {
    //                 results: data.items
    //             };
    //         }
    //     }
    // });
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
