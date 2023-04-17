<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFlightRequest;
use App\Http\Requests\UpdateFlightRequest;
use App\Models\City;
use App\Models\Flight;

class FlightController extends Controller
{
    private int $flightsPerPage = 5;
    private array $columnsToSort = ['Id'];
    private array $columns = ['Departure', 'Arrival', 'Airline'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('components.index',[
            'objects' => Flight::orderByDesc('id')->paginate($this->flightsPerPage),
            'name' => 'Flights',
            'columnsToSort' => $this->columnsToSort,
            'columns' => $this->columns
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFlightRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();
    }

    /**
     * @return array
     */
    public function cities()
    {
        return view('components.index',[
            'objects' => Flight::orderByDesc('id')->paginate($this->flightsPerPage),
            'cities' => City::all(),
            'name' => 'Flights',
            'columnsToSort' => $this->columnsToSort,
            'columns' => $this->columns
        ]);
    }
}
