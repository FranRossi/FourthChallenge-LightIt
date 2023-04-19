@props(['objects', 'columns', 'columnsToSort', 'name'])

<div class="mt-6 flow-root" id="table-container">
    <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead>
            <tr>
                @foreach($columnsToSort as $col)
                    <x-table-header-sort :name="$col" :currentColumn="Str::lower($col)"/>
                @endforeach
                @foreach($columns as $col)
                    <x-table-header :name="$col" />
                @endforeach
                @if($name != 'Flights')
                    <th scope="col" class="relative px-3 py-3.5">
                        <span class="sr-only">Edit</span>
                    </th>
                @endif
                <th scope="col" class="relative px-3 py-3.5">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
            </thead>
            @if($name == 'Flights')
                <x-flight.table-body :flights="$objects"/>
            @else
                <x-table-body :objects="$objects"/>
            @endif

        </table>
    </div>
    <div class="mt-3 mx-4" id="pagination-container">
        {{ $objects->links() }}
    </div>
</div>

@if($name == 'Cities')
    <script src="{{ asset('js/cities/table.js') }}"></script>
@elseif($name == 'Airlines')
    <script src="{{ asset('js/airlines/table.js') }}"></script>
@endif
