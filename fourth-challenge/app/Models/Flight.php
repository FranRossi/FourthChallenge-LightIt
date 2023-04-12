<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    public function airline()
    {
        return $this->belongTo(Airline::class);
    }

    public function cities()
    {
        return $this->hasMany(Flight::class)->withPivot('origin_city_id', 'destination_city_id');
    }
}
