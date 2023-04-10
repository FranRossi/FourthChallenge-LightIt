document.addEventListener('DOMContentLoaded', function() {

    document.querySelector('.create-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        fetch('cities', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                document.querySelector('#table-container').innerHTML = data;
                const newPaginationHtml = new DOMParser().parseFromString(data, 'text/html').querySelector('#pagination-container').innerHTML;
                document.querySelector('#pagination-container').innerHTML = newPaginationHtml;

                document.querySelector('#new-city-name').value = '';
            })
            .catch(error => {
                alert("City could not be added");
            });
    });
});
