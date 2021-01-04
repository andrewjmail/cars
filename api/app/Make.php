<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Make extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function models(): HasMany
    {
        return $this->hasMany('App\Model');
    }
}
