document.addEventListener('DOMContentLoaded', function() {

    document.querySelector('.create-form').addEventListener('submit', function(e) {
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
