<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\VehicleSearchRequest;

interface VehicleRepositoryInterface
{
    public function all(VehicleSearchRequest $request);
}
