@props(['airlines'])
<select class="dropdown-container" id="airlineDropdown">
    <option value="0">Select an airline</option>
    @foreach($airlines as $airline)
        <option value="{{$airline->id}}">{{$airline->name}}</option>
    @endforeach
</select>
