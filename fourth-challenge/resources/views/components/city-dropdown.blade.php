@props(['typeOfCity', 'cities'])
<select class="dropdown-container" id="{{$typeOfCity}}">
    <option value="0">Select a {{$typeOfCity}} city</option>
    @foreach($cities as $city)
        <option value="{{$city->id}}">{{$city->name}}</option>
    @endforeach
</select>
