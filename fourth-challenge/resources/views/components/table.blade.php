@props(['cities'])

<div class="mt-6 flow-root" id="table-container">
    <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300" id="cities-table">
            <thead>
            <tr>
               <x-table-header :name="'Id'" :currentColumn="'id'"/>
               <x-table-header :name="'Name'" :currentColumn="'name'"/>
               <x-table-header :name="'Flights Arriving'" :currentColumn="'flights_arriving'"/>
               <x-table-header :name="'Flights Departing'" :currentColumn="'flights_departing'"/>
                <th scope="col" class="relative px-3 py-3.5">
                    <span class="sr-only">Edit</span>
                </th>
                <th scope="col" class="relative px-3 py-3.5">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
            </thead>
                <x-table-body :cities="$cities"/>
        </table>
    </div>
    <div class="mt-3 mx-4" id="pagination-container">
        {{ $cities->links() }}
    </div>
</div>

<script src="{{ asset('js/cities/table.js') }}"></script>
