<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flight extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function departure_city() : BelongsTo
    {
        return $this->belongsTo(City::class, 'city_departure_id');
    }

    public function arrival_city() : BelongsTo
    {
        return $this->belongsTo(City::class, 'city_arrival_id');
    }

}
