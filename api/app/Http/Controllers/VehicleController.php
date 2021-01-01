<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleSearchRequest;
use App\Repositories\Interfaces\VehicleRepositoryInterface;
use App\Vehicle;
use App\Http\Resources\VehicleResource;

class VehicleController extends Controller
{

    private $vehicleRepository;

    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function index() {  
        $vehicles = $this->vehicleRepository->all();
        return response()->json(VehicleResource::collection($vehicles));
    }

    public function search(VehicleSearchRequest $request) {
        $vehciles = $this->vehicleRepository->search($request);
        return response()->json(VehicleResource::collection($vehicles));
    }
}
