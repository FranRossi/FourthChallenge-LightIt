@props(['label', 'city'])
<div class="sm:col-span-1 ">
    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">{{$label}}</label>
    <div class="mt-2">
        <input type="text"
               name="{{$label}}"
               id="{{$label}}"
               autocomplete="address-level2"
               class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
               required
               value="{{ $city->name }}"
        >
        @error($label)
            <p class="text-red-500 text-xs italic">Error in {{$label}}</p>
        @enderror
    </div>
</div>
