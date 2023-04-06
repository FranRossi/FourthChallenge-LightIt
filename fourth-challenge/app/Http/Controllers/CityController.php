<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private int $cityPerPage = 5;
    private array $columns = ['Id', 'Name', 'Flights Arriving', 'Flights Departing'];

    public function index()
    {
        return view('components.index',[
            'objects' => City::orderByDesc('id')->paginate($this->cityPerPage),
            'columns' => $this->columns,
            'name' => 'Cities'
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
    public function update(StoreUpdateCityRequest $request, City $city)
    {
        $city->update($request->validated());
    }

    public function create()
    {
        return view('cities.create-form');
    }

    public function store(StoreUpdateCityRequest $request)
    {
        $validated = $request->validated();
        City::create($validated)->with('success', 'City Created!');
        $cities = City::orderByDesc('id')->paginate($this->cityPerPage);
        return view('components.table', [
            'cities' => $cities
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
            'objects' => $cities,
            'currentColumn' => $column,
            'currentDirection' => $direction
        ]);
    }

    private function validateColumnName($column)
    {
        return in_array($column, ['id', 'name']);
    }

}
