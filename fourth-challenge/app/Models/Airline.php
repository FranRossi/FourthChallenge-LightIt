<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Airline extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ['amount_of_flights'];

    // Accessors
    public function getAmountOfFlightsAttribute()
    {
        return 0;
        //return Flight::where('city_arrival_id', $this->id)->count();
    }

    protected $appends = ['amount_of_flights'];

    // Accessors
    public function getAmountOfFlightsAttribute()
    {
        return 0;
        //return Flight::where('idOfSOmeEntity', $this->id)->count();
    }
    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class);
    }
}
