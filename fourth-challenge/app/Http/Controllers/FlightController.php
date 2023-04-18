<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFlightRequest;
use App\Models\City;
use App\Models\Flight;
use App\View\Components\FlightTableBody;

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
        return view('components.flight.create-form');
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

    public function cities()
    {
        $cityType = request()->input('type');
        $cityFilter = request()->input('filter');
        if ($cityType === 'departure') {
            return FlightTableBody::renderFlights(Flight::where('city_departure_id', '=', $cityFilter)->get());
        }else{
            return FlightTableBody::renderFlights(Flight::where('city_arrival_id', '=', $cityFilter)->get());
        }
    }
}
