<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Model extends EloquentModel
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function make(): BelongsTo
    {
        return $this->belongsTo('App\Make');
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany('App\Vehicle');
    }
}
