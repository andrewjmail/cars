<?php


namespace App\Actions\Vehicles;

use App\Vehicle;
use Illuminate\Http\Request;

class StoreVehicleAction
{
    public function execute(Request $request): Vehicle
    {
        $vehicle = new Vehicle([
            'colour' => $request->input('colour'),
            'year' => $request->input('year'),
            'price' => $request->input('price'),
            'description' => $request->input('description')
        ]);
        $vehicle->model()->associate($request->input('model'));
        $vehicle->fuelType()->associate($request->input('fuel_type'));
        $vehicle->save();

        return $vehicle;
    }
}
