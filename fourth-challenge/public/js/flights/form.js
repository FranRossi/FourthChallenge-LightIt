$(document).ready(function () {
    $('.dropdown-container').select2({
    });
});

$('.dropdown-container').on('select2:select', function(e) {
    var selectedOption = e.params.data;
    var selectedValue = selectedOption.id;

    var url = '/flights/cities?filter=' + selectedValue;

    $.ajax({
        url: url,
        method: 'GET',
        success: function(flights) {
            //UpdateDropdown(data[0]);
            console.log(flights);
            UpdateTableBody(flights);
        },
        error: function(error) {
            console.log(error);
        }
    });
});

function UpdateDropdown(city) {
    let dropdown = $('.dropdown-container');
    let id = city.id;
    let name = city.name;
    dropdown.empty();
    dropdown.append('<option value="' + id + '">' + name + '</option>');
}

function UpdateTableBody(flightsFiltered) {
    let body = $('#table-body-flights');
    body.replaceWith(flightsFiltered);
}


/*


            <form class="delete-form" id="{{$flight->id}}" >
                @csrf
                <button type="submit" class="delete-button text-sm text-red-400">
                    Delete
                </button>
            </form>
        </td>
    </tr>
 */

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
