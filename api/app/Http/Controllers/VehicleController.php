<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleSearchRequest;
use App\Repositories\Interfaces\VehicleRepositoryInterface;
use App\Http\Resources\VehicleResource;
use Illuminate\Http\JsonResponse;

class VehicleController extends Controller
{

    private $vehicleRepository;

    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function index(VehicleSearchRequest $request): JsonResponse
    {
        $vehicles = $this->vehicleRepository->all($request);
        return response()->json(VehicleResource::collection($vehicles));
    }
}
