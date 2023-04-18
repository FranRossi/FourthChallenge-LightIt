@props(['columns', 'columnsToSort', 'name'])
<div class="sm:flex-auto">
    <h1 class="text-base font-semibold leading-6 text-gray-900 py-2">Departure city </h1>
    <x-city-dropdown typeOfCity="departure"/>
</div>
<div class="sm:flex-auto">
    <h1 class="text-base font-semibold leading-6 text-gray-900 py-2">Arrival city</h1>
    <x-city-dropdown typeOfCity="arrival"/>
</div>

<div class="sm:flex-auto">
    <h1 class="text-base font-semibold leading-6 text-gray-900 py-2">Airline</h1>
    <x-airline-dropdown/>
</div>

<div class="sm:flex-auto justify-end">

        <a href="/flights/create"
           class="w-full sm:w-auto rounded-md bg-indigo-600 py-2 px-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Add {{$name}}
        </a>

</div>
<script src="{{ asset('js/flights/form.js') }}"></script>
