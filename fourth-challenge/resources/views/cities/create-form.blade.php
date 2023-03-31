<x-layout>

<div class="space-y-10 divide-y divide-gray-900/10 py-10 px-12">

  <div class="grid grid-cols-1 gap-y-8 gap-x-8 pt-10 sm:grid-cols-3">
    <div class="px-4 sm:px-0">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Add a city</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">This information will be publicly display.</p>
    </div>

    <form class="create-form bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-1">
     @csrf
      <div class="px-4 py-6 sm:p-8">
        <div class="grid max-w-sm grid-cols-1 gap-y-8 gap-x-6 sm:grid-cols-1">
{{--            TODO pasarlo a un componente--}}
            <div class="sm:col-span-1 ">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                <div class="mt-2">
                    <input type="text"
                           name="name"
                           id="name"
                           autocomplete="address-level2"
                           class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           required
                           placeholder="City name"
                    >
                    @error('city')
                        <p class="text-red-500 text-xs italic">Error in name</p>
                    @enderror
                </div>
            </div>

            <div class="xs:col-span-1">
                <label for="flights_arriving" class="block text-sm font-medium leading-6 text-gray-900">Flights Arriving</label>
                <div class="mt-2">
                    <input type="number"
                           name="flights_arriving"
                           id="flights_arriving"
                           class="block w-sm rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           required
                           placeholder="Flights arriving"
                    >
                    @error('flights_arriving')
                    <p class="text-red-500 text-xs italic">No flights arriving</p>
                    @enderror
                </div>
            </div>

            <div class="sm:col-span-1">
                <label for="flights_departing" class="block text-sm font-medium leading-6 text-gray-900">Flights Departing</label>
                <div class="mt-2">
                    <input type="number"
                           name="flights_departing"
                           id="flights_departing"
                           class="block w-sm rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           required
                           placeholder="Flights departing"
                    >
                    @error('flights_departing')
                    <p class="text-red-500 text-xs italic">No flights arriving</p>
                    @enderror
                </div>
            </div>
        </div>
      </div>
      <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 py-4 px-4 sm:px-8">
            <button type="button" class="cancel-button text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </form>
  </div>

</div>

<script src="{{ asset('js/cities/form.js') }}"></script>

</x-layout>
