<?php

namespace Fanwave\ApiService\Providers;

use Illuminate\Support\ServiceProvider;

class ApiServiceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
