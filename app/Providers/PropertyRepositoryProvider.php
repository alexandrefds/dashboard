<?php

namespace App\Providers;

use App\Interfaces\Repositories\PropertyRepositoryInterface;
use App\Repositories\PropertyRepository;
use Illuminate\Support\ServiceProvider;

class PropertyRepositoryProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            PropertyRepositoryInterface::class,
            PropertyRepository::class
        );
    }

    public function boot(): void
    {
    }
}
