<?php

namespace App\Repositories\Interfaces;

interface MakeRepositoryInterface
{
    public function all();

    public function models(Make $make);
} 