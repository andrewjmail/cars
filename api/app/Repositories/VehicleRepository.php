<?php

namespace App\Repositories;

use App\Repositories\Interfaces\VehicleRepositoryInterface;
use App\Vehicle;
use App\Http\Resources\VehicleResource;

class VehicleRepository implements VehicleRepositoryInterface
{
    public function search($request)
    {
        $query = Vehicle::query();

        if ($request->input('make')) {
            $query->whereHas('model.make', function($q) use ($request) {
                $q->where('name', '=', $request->input('make'));
            });
        }

        if ($request->input('model')) {
            $query->whereHas('model', function($q) use ($request) {
                $q->where('name', '=', $request->input('model'));
            });
        }

        if ($request->input('fuelType')) {
            $query->whereHas('fuelType', function($q) use ($request) {
                $q->where('type', '=', $request->input('fuelType'));
            });
        }

        return  VehicleResource::collection($query->paginate(5));
    }
}