<?php


namespace App\Actions\Models;

use App\Model;
use Illuminate\Http\Request;

class StoreModelAction
{
    public function execute(Request $request): Model
    {
        $model = new Model(['name' => $request->input('name')]);
        $model->make()->associate($request->input('make'));
        $model->save();

        return $model;
    }
}
