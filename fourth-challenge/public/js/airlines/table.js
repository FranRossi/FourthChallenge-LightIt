document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            let formId = this.closest('form').id;
            let parentRow = this.closest('tr');
            let formData = new FormData(this);
            const token = document.querySelector("input[name='_token']").value;
            fetch('airlines/' + formId, {
                method: 'DELETE',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': token
                }
            })
                .then(response => {
                    if (response.ok) {
                        parentRow.remove();
                    } else {
                        throw new Error('Network response was not ok');
                    }
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        });
    });
});
