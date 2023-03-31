$(document).ready(function() {
    $('.create-form').on('submit', function(e) {
        e.preventDefault();

        const cityName = $("#new-city-name").val();
        const flightsDeparting = $("#flights-departing").val();
        const flightsArriving = $("#flights-arriving").val();
        const token = $("input[name='_token']").val();
        $.ajax({
            type: 'POST',
            url: 'cities',
            data: {
                name: cityName,
                flights_arriving: flightsArriving,
                flights_departing: flightsDeparting,
                _token: token
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                // {{TODO - add error handling}}}
                alert("City could not be added");
            }
        });
    });
});

// Edit city
$(document).ready(function() {
    $('.edit-form').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        var formId = $(this).closest('form').attr('id');
        console.log(formData);
        $.ajax({
            type: 'PATCH',
            url: '/cities/' + formId,
            data: formData,
            success: function(response) {
                // Redirect to previous URL
                window.location.href = document.referrer;

            },
            error: function(xhr, status, error) {
                // Do something on error
            }
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

