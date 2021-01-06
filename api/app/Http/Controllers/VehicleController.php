<?php

namespace App\Http\Controllers;

use App\Actions\Vehicles\StoreVehicleAction;
use App\Http\Requests\CreateVehicleRequest;
use App\Http\Requests\VehicleSearchRequest;
use App\Repositories\Interfaces\VehicleRepositoryInterface;
use App\Http\Resources\VehicleResource;
use Illuminate\Http\JsonResponse;

class VehicleController extends Controller
{

    private $vehicleRepository;
    private $storeVehicleAction;

    public function __construct(
        VehicleRepositoryInterface $vehicleRepository,
        StoreVehicleAction $storeVehicleAction
    )
    {
        $this->vehicleRepository = $vehicleRepository;
        $this->storeVehicleAction = $storeVehicleAction;
    }

    public function index(VehicleSearchRequest $request): JsonResponse
    {
        $vehicles = $this->vehicleRepository->all($request);
        return response()->json(VehicleResource::collection($vehicles));
    }

    public function store(CreateVehicleRequest $request): JsonResponse
    {
        $vehicle = $this->storeVehicleAction->execute($request);
        return response()->json(VehicleResource::make($vehicle));
    }
}
