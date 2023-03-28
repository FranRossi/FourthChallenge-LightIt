<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return view('cities.index',[
            'cities' => City::latest()->paginate(5)
        ]);
    }

    public function destroy(City $city)
    {
        $city->delete();
        return back()->with('success', 'City Deleted!');;
    }
}
