<?php

namespace App\Repositories;

use App\Make;
use App\Model;
use App\Repositories\Interfaces\MakeRepositoryInterface;
use App\Http\Resources\MakeResource;
use App\Http\Resources\ModelResource;

class MakeRepository implements MakeRepositoryInterface
{
    public function all()
    {
        return MakeResource::collection(Make::with('models')->orderBy('name')->paginate(5));
    }

    public function models($make)
    {
        return ModelResource::collection(Model::orderBy('name')->where('make_id', $make->id)->paginate(5));
    }
} 