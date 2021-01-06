<?php


namespace App\Actions\Vehicles;

use App\Vehicle;

class DeleteVehicleAction
{
    public function execute(Vehicle $vehicle)
    {
        $vehicle->delete();
        return true;
    }
}
