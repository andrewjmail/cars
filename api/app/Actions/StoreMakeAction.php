<?php


namespace App\Actions;


use App\Make;
use Illuminate\Http\Request;

class StoreMakeAction
{
    public function execute(Request $request): Make
    {
        return Make::create(['name' => $request->input('name')]);
    }
}
