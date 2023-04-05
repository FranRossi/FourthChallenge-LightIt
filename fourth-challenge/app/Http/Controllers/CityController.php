<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    private $cityPerPage = 5;

    public function index()
    {
        return view('cities.index',[
            'cities' => City::orderByDesc('id')->paginate($this->cityPerPage)
        ]);
    }

    public function destroy(City $city)
    {
        $city->delete();
    }

    public function edit(City $city)
    {
        return view('cities.edit-form', ['city' => $city]);
    }
    public function update(City $city)
    {
        $city->update($this->validateCity($city));
    }

    public function create()
    {
        return view('cities.create-form');
    }

    public function store()
    {
        City::create($this->validateCity())->with('success', 'City Created!');
        $cities = City::orderByDesc('id')->paginate($this->cityPerPage);
        return view('components.table', [
            'cities' => $cities
        ]);
    }

    protected function validateCity(City $city = null): array
    {
        $city = $city ?? new City();

        return request()->validate([
            'name' => ['required', Rule::unique('cities', 'name')->ignore($city)],
            'flights_arriving' => ['required', 'integer', 'min:0', ],
            'flights_departing' => ['required', 'integer', 'min:0',]
        ]);
    }

    public function sort(Request $request)
    {
        $column = $request->input('column');
        if (!$this->validateColumnName($column)) {
            return response()->json(['error' => 'Invalid column name'], 400);
        }
        $direction = $request->input('direction');
        $cities = $direction === 'asc' ? City::orderBy($column)->paginate($this->cityPerPage) : City::orderByDesc($column)->paginate($this->cityPerPage);

        return view('components.table', [
            'cities' => $cities,
            'currentColumn' => $column,
            'currentDirection' => $direction
        ]);
    }

    private function validateColumnName($column)
    {
        return in_array($column, ['id', 'name', 'flights_arriving', 'flights_departing']);
    }

}
