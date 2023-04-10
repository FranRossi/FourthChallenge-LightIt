<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAirlineRequest;
use App\Models\Airline;

class AirlineController extends Controller
{
    private int $airlinePerPage = 5;
    private array $columnsToSort = ['Id', 'Name'];
    private array $columns = ['Description', 'Amount of Flights'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('components.index',[
            'objects' => Airline::orderByDesc('id')->paginate($this->airlinePerPage),
            'name' => 'Airlines',
            'columnsToSort' => $this->columnsToSort,
            'columns' => $this->columns
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateAirlineRequest $request)
    {
        $validated = $request->validated();
        Airline::create($validated)->with('success', 'Airline Created!');
        $airlines = Airline::orderByDesc('id')->paginate($this->airlinePerPage);
        return view('components.table', [
            'objects' => $airlines,
            'columns' => $this->columns,
            'columnsToSort' => $this->columnsToSort,
            'name' => 'Airlines'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Airline $airline)
    {
        return view('components.edit-form', [
            'object' => $airline,
            'name' => 'airline'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateAirlineRequest $request, Airline $airline)
    {
        $airline->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airline $airline)
    {
        $airline->delete();
    }
}
