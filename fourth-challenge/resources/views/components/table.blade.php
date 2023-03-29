@props(['cities'])

<div class="mt-6 flow-root">
    <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead>
            <tr>
               <x-table-header :name="'Id'"/>
               <x-table-header :name="'Name'"/>
               <x-table-header :name="'Flights Departing'"/>
               <x-table-header :name="'Flights Arriving'"/>
                <th scope="col" class="relative px-3 py-3.5">
                    <span class="sr-only">Edit</span>
                </th>
                <th scope="col" class="relative px-3 py-3.5">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
            @foreach($cities as $city)
                <tr>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $city->id }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $city->name }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $city->flights_arriving }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $city->flights_departing }}</td>
                    <td class="relative whitespace-nowrap px-3 py-4 text-right text-sm">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $city->id }}</span></a>
                    </td>
                    <td class="relative whitespace-nowrap px-3 py-4 text-right text-sm ">
                        <form class="delete-form" method="POST" action="/cities/{{$city->id}}" >
                            @csrf
                            @method('DELETE')
                            <button class="delete-button text-sm text-red-400">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3 mx-4">
        {{ $cities->links() }}
    </div>
</div>

<script src="{{ asset('js/citiesCRUD.js') }}"></script>
