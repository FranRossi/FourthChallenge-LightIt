<x-layout>
    <div class="min-h-full">

{{--        TODO - Add a header component--}}
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Cities</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">Cities</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the cities in <strong>AirTour</strong>.</p>
                        </div>

                        <form class="create-form sm:flex-auto ">
                            @csrf
                            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-auto">
                                <div class="mt-2">
                                    <input type="text"
                                           name="name"
                                           id="new-city-name"
                                           class="sm:flex-auto w-sm rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                           required
                                           placeholder="Name of the city"
                                    >
                                    @error('name')
                                    <p class="text-red-500 text-xs italic">Error adding a city</p>
                                    @enderror
    {{--                                <a href="/cities/create">--}}
                                        <button type="sumbit" class="sm:flex-auto rounded-md bg-indigo-600 py-2 px-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                            Add City
                                        </button>
    {{--                                </a>--}}
                                </div>

                            </div>
                    </form>
                    </div>
                    <x-table  :cities="$cities">
                    </x-table>
                </div>

            </div>
        </main>
    </div>

<script src="{{ asset('js/cities/form.js') }}"></script>
</x-layout>
