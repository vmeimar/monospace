<?php

namespace App\Providers;

use App\Repositories\VesselRepository;
use App\Repositories\VesselRepositoryInterface;
use App\Repositories\VoyageRepository;
use App\Repositories\VoyageRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(VoyageRepositoryInterface::class, VoyageRepository::class);
        $this->app->bind(VesselRepositoryInterface::class, VesselRepository::class);
    }
}
