$(document).ready(function () {
    $('.dropdown-container').select2({
    });
});

$('.dropdown-container').on('select2:select', function(e) {
    let selectedOption = e.params.data;
    let typeOfDropdown = e.target.id;
    let idOfSelectedValue = selectedOption.id;
    let resourceFilter = (typeOfDropdown === 'airlineDropdown') ? 'airlines' : 'cities';

    let url = '/flights/' + resourceFilter + '?type=' + typeOfDropdown + '&filter=' + idOfSelectedValue;

    $.ajax({
        url: url,
        method: 'GET',
        success: function(flights) {
            //UpdateDropdown(data[0]);
            UpdateTableBody(flights);
        },
        error: function(error) {
            console.log(error);
        }
    });
});

function UpdateTableBody(flightsFiltered) {
    let body = $('#table-body-flights');
    body.replaceWith(flightsFiltered);
}

function UpdateDropdown(city) {
    let dropdown = $('.dropdown-container');
    let id = city.id;
    let name = city.name;
    dropdown.empty();
    dropdown.append('<option value="' + id + '">' + name + '</option>');
}

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


$(document).ready(function() {
    $('.cancel-button').click(function(e) {
        e.preventDefault();

        $.ajax({
            success: function() {
                window.location.href = document.location.origin + '/flights';
            }
        });
    });
});
