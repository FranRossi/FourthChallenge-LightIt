@props(['flights'])
<tbody class="divide-y divide-gray-200 bg-white">
@foreach($flights as $flight)
    <tr>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $flight->id }}</td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $flight->departure_city->name }}</td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $flight->arrival_city->name }}</td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $flight->airline->name }}</td>
        <td class="relative whitespace-nowrap px-3 py-4 text-right text-sm">
            <a href="/flights/{{$flight->id}}/edit" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $flight->id }}</span></a>
        </td>
        <td class="relative whitespace-nowrap px-3 py-4 text-right text-sm ">
            <form class="delete-form" id="{{$flight->id}}" >
                @csrf
                <button type="submit" class="delete-button text-sm text-red-400">
                    Delete
                </button>
            </form>
        </td>
    </tr>
@endforeach
</tbody>
