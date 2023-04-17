@props(['name', 'object'])
<div class="sm:col-span-1 ">
    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">{{ucwords($name)}}</label>
    <div class="mt-2">
        <input type="text"
               name="{{$name}}"
               id="{{$name}}"
               class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
               required
               value="{{ $object->name }}"
        >
        @error($name)
            <p class="text-red-500 text-xs italic">Error in {{$name}}</p>
        @enderror
    </div>
</div>
