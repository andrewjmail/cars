<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleSearchRequest;
use App\Repositories\Interfaces\VehicleRepositoryInterface;
use App\Vehicle;

class VehiclesController extends Controller
{

    private $vehicleRepository;

    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function search(VehicleSearchRequest $request) {
        return $this->vehicleRepository->search($request);
    }
}
