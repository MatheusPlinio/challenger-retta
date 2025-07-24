<?php

namespace App\Providers;

use App\Services\Contracts\OpenDataInterface;
use App\Services\OpenDataService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            OpenDataInterface::class,
            OpenDataService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
