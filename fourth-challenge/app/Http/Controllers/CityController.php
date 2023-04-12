<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private int $cityPerPage = 5;
    private array $columnsToSort = ['Id', 'Name'];
    private array $columns = ['Flights Arriving', 'Flights Departing'];

    public function index()
    {
        return view('components.index',[
            'objects' => City::orderByDesc('id')->paginate($this->cityPerPage),
            'columns' => $this->columns,
            'columnsToSort' => $this->columnsToSort,
            'name' => 'Cities'
        ]);
    }

    public function destroy(City $city)
    {
        $city->delete();
    }

    public function edit(City $city)
    {
        return view('components.edit-form', [
            'object' => $city,
            'name' => 'city'
        ]);
    }
    public function update(StoreUpdateCityRequest $request, City $city)
    {
        $city->update($request->validated());
    }

    public function store(StoreUpdateCityRequest $request)
    {
        $validated = $request->validated();
        City::create($validated)->with('success', 'City Created!');
        $cities = City::orderByDesc('id')->paginate($this->cityPerPage);
        return view('components.table', [
            'objects' => $cities,
            'columns' => $this->columns,
            'columnsToSort' => $this->columnsToSort,
            'name' => 'Cities'
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
        $columnsToCheck = array_map('strtolower', $this->columnsToSort);
        return in_array($column, $columnsToCheck);
    }

}
