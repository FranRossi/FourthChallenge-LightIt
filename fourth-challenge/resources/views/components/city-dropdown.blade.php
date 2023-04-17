@props(['typeOfCity', 'cities'])
<select class="dropdown-container" name="typeOfCity">
    @foreach($cities as $city)
        <option value="{{$city->id}}">{{$city->name}}</option>
    @endforeach
</select>
