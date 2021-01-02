<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FuelType extends Model
{
    public $timestamps = false;

    public function vehicles(): HasMany
    {
        return $this->hasMany('App\Vehicle');
    }
}
