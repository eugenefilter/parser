<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Properties\PropertyRepository;
use App\Infrastructure\Persistence\EloquentPropertyRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PropertyRepository::class, EloquentPropertyRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
