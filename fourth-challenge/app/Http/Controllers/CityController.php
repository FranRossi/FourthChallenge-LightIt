<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    public function index()
    {
        return view('cities.index',[
            'cities' => City::paginate(5)
        ]);
    }

    public function destroy(City $city)
    {
        $city->delete();
    }

    public function edit(City $city)
    {
        return view('cities.manage-form', ['city' => $city]);
    }
    public function update(City $city)
    {
        $city->update($this->validateCity());
        return back()->with('success', 'City Updated!');
    }

    public function create()
    {
        return view('cities.manage-form');
    }

    public function store()
    {
        City::create($this->validateCity());
        return redirect('/cities')->with('success', 'City Created!');
    }

    protected function validateCity(City $city = null): array
    {
        $city = $city ?: new City;
        return request()->validate([
            'name' => ['required', Rule::unique('cities', 'name')->ignore($city)],
            'flights_arriving' => ['required', 'integer'],
            'flights_departing' => ['required', 'integer']
        ]);
    }

}
