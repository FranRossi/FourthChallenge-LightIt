@props(['objects'])

<tbody class="divide-y divide-gray-200 bg-white">
@foreach($objects as $object)
    <tr>
        @foreach($object->toArray() as $key => $value)
            @if (! in_array($key, ['created_at', 'updated_at']))
             <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $value }}</td>
            @endif
        @endforeach
        <td class="relative whitespace-nowrap px-3 py-4 text-right text-sm">
            <a href="/{{ $object->getTable() }}/{{$object->id}}/edit" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $object->id }}</span></a>
        </td>
        <td class="relative whitespace-nowrap px-3 py-4 text-right text-sm ">
            <form class="delete-form" id="{{$object->id}}" >
                @csrf
                <button type="submit" class="delete-button text-sm text-red-400">
                    Delete
                </button>
            </form>
        </td>
    </tr>
@endforeach
</tbody>
