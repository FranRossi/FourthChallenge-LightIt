$(document).ready(function () {
    $('.dropdown-container').select2({
    });
});

toastr.options = {
    closeButton: true,
    progressBar: true,
};

$(document).ready(function() {
    $('.create-form').on('submit', function(e) {
        e.preventDefault();
        let departureCity = $('#departure').val();
        let arrivalCity = $('#arrival').val();
        let airline = $('#airlineDropdown').val();
        const token = document.querySelector("input[name='_token']").value;
        let departureDate = departure.departure ? departure.departure.toISOString().slice(0, 10) : null;
        let arrivalDate = arrival.arrival ? arrival.arrival.toISOString().slice(0, 10) : null;

        axios.post('/flights', {
            headers: {
                'X-CSRF-TOKEN': token
            },
            departure_date: departureDate,
            arrival_date: arrivalDate,
            airline_id: airline,
            city_departure_id: departureCity,
            city_arrival_id: arrivalCity,

        })
            .then(response => {
                toastr.success('Flight has been created successfully!');
                window.location.href = document.location.origin + '/flights';
            })
            .catch(error => {
                if(error.response.status === 422) {
                    let errors = error.response.data.errors;
                    let errorMessages = '';
                    for(let key in errors) {
                        errorMessages += errors[key] + ' ';
                    }
                    toastr.error(errorMessages);
                }
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
