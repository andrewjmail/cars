<?php

namespace App\Http\Controllers;

use App\Actions\DeleteMakeAction;
use App\Actions\StoreMakeAction;
use App\Actions\UpdateMakeAction;
use App\Http\Resources\MakeResource;
use App\Repositories\Interfaces\MakeRepositoryInterface;
use App\Make;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MakeController extends Controller
{
    private $makeRepository;
    private $storeMakeAction;
    private $updateMakeAction;
    private $deleteMakeAction;

    public function __construct(
        MakeRepositoryInterface $makeRepository,
        StoreMakeAction $storeMakeAction,
        UpdateMakeAction $updateMakeAction,
        DeleteMakeAction $deleteMakeAction
    )
    {
        $this->storeMakeAction = $storeMakeAction;
        $this->makeRepository = $makeRepository;
        $this->updateMakeAction = $updateMakeAction;
        $this->deleteMakeAction = $deleteMakeAction;
    }

    public function index(): JsonResponse
    {
        return response()->json(MakeResource::collection($this->makeRepository->all()));
    }

    public function store(Request $request): JsonResponse
    {
        $make = $this->storeMakeAction->execute($request);
        return response()->json(MakeResource::make($make));
    }

    public function update(Make $make, Request $request): JsonResponse
    {
        $make = $this->updateMakeAction->execute($make, $request);
        return response()->json(MakeResource::make($make));
    }

    public function destroy(Make $make): JsonResponse
    {
        $this->deleteMakeAction->execute($make);
        return response()->json(MakeResource::make($make));
    }

    public function models(Make $make)
    {
        return $this->makeRepository->models($make);
    }
}
