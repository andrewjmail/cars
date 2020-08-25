<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\MakeRepositoryInterface;
use App\Make;

class MakesController extends Controller
{
    private $makeRepository;

    public function __construct(MakeRepositoryInterface $makeRepository)
    {
        $this->makeRepository = $makeRepository;
    }

    public function index()
    {
        return $this->makeRepository->all();
    }

    public function models(Make $make)
    {
        return $this->makeRepository->models($make);
    }
}
