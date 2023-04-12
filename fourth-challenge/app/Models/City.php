<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class City extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ['flights_arriving', 'flights_departing'];

    // Accessors
    public function getFlightsArrivingAttribute()
    {
        return 0;
        //return Flight::where('city_arrival_id', $this->id)->count();
    }

    public function getFlightsDepartingAttribute()
    {
        return 0;
        //return Flight::where('city_departure_id', $this->id)->count();
    }

    public function airlines(): BelongsToMany
    {
        return $this->belongsToMany(Airline::class);
    }

    public function flights()
    {
        return $this->belongsToMany(Flight::class);
    }

}
