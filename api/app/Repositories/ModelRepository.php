<?php

namespace App\Repositories;

use App\Model;
use App\Repositories\Interfaces\ModelRepositoryInterface;

class ModelRepository implements ModelRepositoryInterface
{
    public function all()
    {
        return Model::orderBy('name')->get();
    }
}
