@props(['objects', 'columns', 'columnsToSort', 'name'])

<div class="mt-6 flow-root" id="table-container">
    <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300" id="cities-table">
            <thead>
            <tr>
                @foreach($columnsToSort as $col)
                    <x-table-header-sort :name="$col" :currentColumn="Str::lower($col)"/>
                @endforeach
                @foreach($columns as $col)
                    <x-table-header :name="$col" />
                @endforeach
                <th scope="col" class="relative px-3 py-3.5">
                    <span class="sr-only">Edit</span>
                </th>
                <th scope="col" class="relative px-3 py-3.5">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
            </thead>
            @if($name == 'Cities')
                <x-city.table-body :cities="$objects"/>
            @elseif($name == 'Airlines')
                <x-table-body :objects="$objects"/>
            @endif

        </table>
    </div>
    <div class="mt-3 mx-4" id="pagination-container">
        {{ $objects->links() }}
    </div>
</div>

<script src="{{ asset('js/table.js') }}"></script>
