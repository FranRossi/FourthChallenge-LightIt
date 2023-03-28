<x-layout>
    <div class="min-h-full">


        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Dashboard</h1>
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
                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                            <button type="button" class="block rounded-md bg-indigo-600 py-2 px-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add City</button>
                        </div>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                            <a href="#" class="group inline-flex">
                                                Id
                                                <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                                <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                                </svg>
                                              </span>
                                            </a>
                                        </th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            <a href="#" class="group inline-flex">
                                                Name
                                                <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                                <span class="ml-2 flex-none rounded bg-gray-100 text-gray-900 group-hover:bg-gray-200">
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                                </svg>
                                              </span>
                                            </a>
                                        </th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            <a href="#" class="group inline-flex">
                                                Flights Departing
                                                <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                                <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                                <svg class="invisible ml-2 h-5 w-5 flex-none rounded text-gray-400 group-hover:visible group-focus:visible" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                                </svg>
                                              </span>
                                            </a>
                                        </th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            <a href="#" class="group inline-flex">
                                                Flights Arriving
                                                <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                                <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                                <svg class="invisible ml-2 h-5 w-5 flex-none rounded text-gray-400 group-hover:visible group-focus:visible" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                                </svg>
                                              </span>
                                            </a>
                                        </th>
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
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Delete<span class="sr-only">, {{ $city->id }}</span></a>
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
                </div>

            </div>
        </main>
    </div>

</x-layout>
