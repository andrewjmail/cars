<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    public $timestamps = false;
    
    public function make()
    {
        return $this->belongsTo('App\Make');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Vehicle');
    }
}
