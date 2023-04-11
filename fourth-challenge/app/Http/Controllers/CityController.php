<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCityRequest;
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
            return response()->json(['error' => $column], 400);
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
        return in_array($column, ['id', 'name']);
    }

}
