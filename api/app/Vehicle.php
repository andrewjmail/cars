<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    protected $fillable = ['colour', 'price', 'description', 'year'];

    public function model(): BelongsTo
    {
        return $this->belongsTo('App\Model');
    }

    public function fuelType(): BelongsTo
    {
        return $this->belongsTo('App\FuelType');
    }
}
