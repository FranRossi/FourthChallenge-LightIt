$(document).ready(function() {
    $('.manage-form').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: '/cities',
            data: formData,
            success: function(response) {
                // Clear the form inputs
                $('#name').val('');
                $('#flights_arriving').val('');
                $('#flights_departing').val('');

                // // Redirect to previous URL
                window.location.href = document.referrer;
                // Add new city to table
                const newCity = response.city;
                const tableRow = `
                    <tr>
                        <td>${newCity.name}</td>
                        <td>${newCity.flights_arriving}</td>
                        <td>${newCity.flights_departing}</td>
                        <<td class="relative whitespace-nowrap px-3 py-4 text-right text-sm ">
                            <form method="POST" action="/cities/${newCity.id}">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm text-red-400">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                `;
                $('#cities-table tbody').append(tableRow);
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Do something on error
            }
        });
    });
});
