<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function model()
    {
        return $this->belongsTo('App\Model');
    }

    public function fuelType()
    {
        return $this->belongsTo('App\FuelType');
    }
}
