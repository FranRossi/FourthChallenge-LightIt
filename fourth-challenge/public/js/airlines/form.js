document.addEventListener('DOMContentLoaded', function() {

    $('.create-form').on('submit', function(e) {
        e.preventDefault();
        const token = document.querySelector("input[name='_token']").value;
        const airlineName = document.querySelector("#new-Airlines-name").value;
        fetch('airlines', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({
                name: airlineName,
            })
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Airline could not be added");
                }
                return response.text();
            })
            .then(data => {
                const tableContainer = document.querySelector("#table-container");
                tableContainer.innerHTML = data;

                const newPaginationHtml = $(data).find('#pagination-container').html();
                $('#pagination-container').html(newPaginationHtml);
            })
            .catch(error => {
                alert("Airline could not be added");
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


document.addEventListener('DOMContentLoaded', () => {
    const editForms = document.querySelectorAll('.edit-form');

    editForms.forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();
            const token = document.querySelector("input[name='_token']").value;
            const airlineName = document.querySelector("#name").value;
            const formId = form.getAttribute('id');

            fetch(`/airlines/${formId}`, {
                method: 'PATCH',
                body: JSON.stringify({
                    name: airlineName,
                }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                }
            })
                .then(response => {
                    if(response.ok) {
                        window.location.href = document.location.origin + '/airlines';
                    } else if (response.status === 405) {
                        throw new Error('There was an error validating Airline\'s new name. Please try again.');
                    } else {
                        throw new Error('Airline could not be edited');
                    }
                })
                .catch(error => {
                    alert(error.message);
                });
        });
    });
});

