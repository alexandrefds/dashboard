<?php

namespace App\Providers;

use App\Interfaces\Services\PropertyServiceInterface;
use App\Services\PropertyService;
use Illuminate\Support\ServiceProvider;

class PropertyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            PropertyServiceInterface::class,
            PropertyService::class
        );
    }

    public function boot(): void
    {
    }
}
