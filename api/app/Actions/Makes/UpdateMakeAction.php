<?php


namespace App\Actions\Makes;

use App\Make;
use Illuminate\Http\Request;

class UpdateMakeAction
{
    public function execute(Make $make, Request $request): Make
    {
        $make->name = $request->input('name');
        $make->save();
        return $make;
    }
}
