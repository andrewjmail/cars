<?php


namespace App\Actions\Vehicles;

use App\Vehicle;
use Illuminate\Http\Request;

class UpdateVehicleAction
{
    public function execute(Vehicle $vehicle, Request $request): Vehicle
    {
        $vehicle->fill([
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
