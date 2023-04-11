@props(['cities'])
<tbody class="divide-y divide-gray-200 bg-white">
@foreach($cities as $city)
    <tr>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $city->id }}</td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $city->name }}</td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $city->flights_arriving }}</td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $city->flights_departing }}</td>
        <td class="relative whitespace-nowrap px-3 py-4 text-right text-sm">
            <a href="/cities/{{$city->id}}/edit" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $city->id }}</span></a>
        </td>
        <td class="relative whitespace-nowrap px-3 py-4 text-right text-sm ">
            <form class="delete-form" id="{{$city->id}}" >
                @csrf
                <button type="submit" class="delete-button text-sm text-red-400">
                    Delete
                </button>
            </form>
        </td>
    </tr>
@endforeach
</tbody>
