<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    public $timestamps = false;

    public function models(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Model');
    }
}
