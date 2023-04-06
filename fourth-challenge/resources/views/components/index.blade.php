<x-layout>
    <div class="min-h-full">
        <x-header :name="$name"/>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{$name}}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the {{$name}} in <strong>AirTour</strong>.</p>
                        </div>

                        <form class="create-form sm:flex justify-end">
                            @csrf
                            <div class="flex flex-col sm:flex-row sm:items-center">
                                <div class="sm:w-full sm:mr-4">
                                    <label for="new-{{$name}}-name" class="sr-only">Name of the {{$name}}</label>
                                    <div class="flex items-center border rounded-md shadow-sm ring-1 ring-inset ring-gray-300 py-3 px-2">
                                        <input type="text"
                                               name="name"
                                               id="new-{{$name}}-name"
                                               class="w-48 mx-4 pl-2 rounded-md border-0 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-500 text-sm"
                                               required
                                               placeholder="Name of the {{$name}}">
                                    </div>
                                    @error('name')
                                    <p class="text-red-500 text-xs italic">Error adding a {{$name}}</p>
                                    @enderror
                                </div>
                                <div class="sm:w-1/2 mt-4 sm:mt-0">
                                    <button type="submit"
                                            class="w-full sm:w-auto rounded-md bg-indigo-600 py-2 px-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        Add {{$name}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <x-table :objects="$objects" :columns="$columns" :columnsToSort="$columnsToSort" :name="$name">
                        </x-table>
                    </div>
                </div>

            </div>
        </main>
    </div>

<script src="{{ asset('js/form.js') }}"></script>
</x-layout>
