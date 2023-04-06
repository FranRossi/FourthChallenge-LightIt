<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAirlineRequest;
use App\Http\Requests\UpdateAirlineRequest;
use App\Models\Airline;

class AirlineController extends Controller
{
    private int $cityPerPage = 5;
    private array $columnsToSort = ['Id', 'Name'];
    private array $columns = ['Description', 'Amount of Flights'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('components.index',[
            'objects' => Airline::orderByDesc('id')->paginate($this->cityPerPage),
            'name' => 'Airlines',
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
    public function store(StoreAirlineRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Airline $airline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Airline $airline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAirlineRequest $request, Airline $airline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airline $airline)
    {
        //
    }
}
