<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    public $timestamps = false;
    
    public function models()
    {
        return $this->hasMany('App\Model');
    }
}
