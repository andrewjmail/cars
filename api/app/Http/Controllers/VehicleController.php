<?php

namespace App\Http\Controllers;

use App\Actions\Vehicles\DeleteVehicleAction;
use App\Actions\Vehicles\UpdateVehicleAction;
use App\Actions\Vehicles\StoreVehicleAction;
use App\Http\Requests\CreateVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Requests\VehicleSearchRequest;
use App\Repositories\Interfaces\VehicleRepositoryInterface;
use App\Http\Resources\VehicleResource;
use App\Vehicle;
use Illuminate\Http\JsonResponse;

class VehicleController extends Controller
{

    private $vehicleRepository;
    private $storeVehicleAction;
    private $updateVehicleAction;
    private $deleteVehicleAction;

    public function __construct(
        VehicleRepositoryInterface $vehicleRepository,
        StoreVehicleAction $storeVehicleAction,
        UpdateVehicleAction $updateVehicleAction,
        DeleteVehicleAction $deleteVehicleAction
    )
    {
        $this->vehicleRepository = $vehicleRepository;
        $this->storeVehicleAction = $storeVehicleAction;
        $this->updateVehicleAction = $updateVehicleAction;
        $this->deleteVehicleAction = $deleteVehicleAction;
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

    public function update(Vehicle $vehicle, UpdateVehicleRequest $request): JsonResponse
    {
        $vehicle = $this->updateVehicleAction->execute($vehicle, $request);
        return response()->json(VehicleResource::make($vehicle));
    }

    public function destroy(Vehicle $vehicle): JsonResponse
    {
        $this->deleteVehicleAction->execute($vehicle);
        return response()->json(VehicleResource::make($vehicle));
    }
}
