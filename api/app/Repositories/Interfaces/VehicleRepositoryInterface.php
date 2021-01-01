<?php

namespace App\Repositories\Interfaces;

interface VehicleRepositoryInterface
{
    public function all();
    public function search($request);
} 