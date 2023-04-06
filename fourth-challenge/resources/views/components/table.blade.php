@props(['objects', 'columns'])

<div class="mt-6 flow-root" id="table-container">
    <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300" id="cities-table">
            <thead>
            <tr>
               <x-table-header-sort :name="'Id'" :currentColumn="'id'"/>
               <x-table-header-sort :name="'Name'" :currentColumn="'name'"/>
               <x-table-header :name="'Flights Arriving'" />
               <x-table-header :name="'Flights Departing'"/>
                <th scope="col" class="relative px-3 py-3.5">
                    <span class="sr-only">Edit</span>
                </th>
                <th scope="col" class="relative px-3 py-3.5">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
            </thead>
                <x-table-body :cities="$objects"/>
        </table>
    </div>
    <div class="mt-3 mx-4" id="pagination-container">
        {{ $objects->links() }}
    </div>
</div>

<script src="{{ asset('js/cities/table.js') }}"></script>
