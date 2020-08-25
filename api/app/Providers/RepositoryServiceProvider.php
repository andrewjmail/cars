<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MakeRepository;
use App\Repositories\Interfaces\MakeRepositoryInterface;
use App\Repositories\VehicleRepository;
use App\Repositories\Interfaces\VehicleRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            MakeRepositoryInterface::class, 
            MakeRepository::class
        );

        $this->app->bind(
            VehicleRepositoryInterface::class, 
            VehicleRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}