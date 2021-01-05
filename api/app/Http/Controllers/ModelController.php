<?php

namespace App\Http\Controllers;

use App\Actions\Models\DeleteModelAction;
use App\Actions\Models\StoreModelAction;
use App\Actions\Models\UpdateModelAction;
use App\Http\Requests\CreateModelRequest;
use App\Http\Requests\UpdateModelRequest;
use App\Http\Resources\ModelResource;
use App\Make;
use App\Model;
use App\Repositories\Interfaces\ModelRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ModelController extends Controller
{

    private $modelRepository;
    private $storeModelAction;
    private $updateModelAction;
    private $deleteModelAction;

    public function __construct(
        ModelRepositoryInterface $modelRepository,
        StoreModelAction $storeModelAction,
        UpdateModelAction $updateModelAction,
        DeleteModelAction $deleteModelAction
    )
    {
        $this->modelRepository = $modelRepository;
        $this->storeModelAction = $storeModelAction;
        $this->updateModelAction = $updateModelAction;
        $this->deleteModelAction = $deleteModelAction;
    }

    public function index(): JsonResponse
    {
        return response()->json(ModelResource::collection($this->modelRepository->all()));
    }

    public function store(CreateModelRequest $request): JsonResponse
    {
        $model = $this->storeModelAction->execute($request);
        return response()->json(ModelResource::make($model));
    }

    public function update(Model $model, UpdateModelRequest $request): JsonResponse
    {
        $model = $this->updateModelAction->execute($model, $request);
        return response()->json(ModelResource::make($model));
    }

    public function destroy(Model $model): JsonResponse
    {
        $this->deleteModelAction->execute($model);
        return response()->json(ModelResource::make($model));
    }
}
