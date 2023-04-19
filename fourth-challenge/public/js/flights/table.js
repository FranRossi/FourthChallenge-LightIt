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


toastr.options = {
    closeButton: true,
    progressBar: true,
};

$(document).ready(function() {
    $('.delete-form').on('submit', function(e) {
        e.preventDefault();

        const formId = $(this).closest('form').attr('id');
        const parentRow = $(this).closest('tr');
        const token = document.querySelector("input[name='_token']").value;
        toastr.warning(`Are you sure you want to delete flight with ID ${formId}?
         <br/><br/>
         <div class="text-center">
             <button type="button" id="accept" class="btn btn-danger btn-sm border px-3 hover:bg-red-600">Yes</button>
             <button type="button" id="cancel" class="btn btn-secondary btn-sm border px-3 ml-4 hover:bg-gray-600">No</button>
         </div>`,
            'Delete Flight', { timeOut: 0, closeButton: false, tapToDismiss: false, rtl: false });
        $('#accept').on('click', function () {
            confirmDelete(formId,parentRow, token);
            toastr.remove();
        });
        $('#cancel').on('click', function () {
            toastr.remove();
        });
    });
});

function confirmDelete(formId, parentRow, token){
    axios.delete('flights/' + formId, {
        headers: {
            'X-CSRF-TOKEN': token
        }
    })
        .then(response => {
            toastr.success('Flight has been deleted successfully!');
            parentRow.remove();
        })
        .catch(error => {
            toastr.error('There was an error deleting the flight!');
        });
}
