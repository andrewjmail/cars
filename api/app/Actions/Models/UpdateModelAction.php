<?php


namespace App\Actions\Models;

use App\Model;
use Illuminate\Http\Request;

class UpdateModelAction
{
    public function execute(Model $model, Request $request): Model
    {
        $model->name = $request->input('name');
        $model->make()->associate($request->input('make'));
        $model->save();

        return $model;
    }
}
