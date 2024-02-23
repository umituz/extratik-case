<?php

namespace App\Providers;

use App\Repositories\PatientRepository;
use App\Repositories\PatientRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(PatientRepositoryInterface::class, PatientRepository::class);
    }
}
