<?php

namespace Prasso\AutoProHub;

use Illuminate\Support\ServiceProvider;

class AutoProHubServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/autoprohub.php', 'autoprohub'
        );
    }

    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'autoprohub');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Publish configuration
        $this->publishes([
            __DIR__.'/../config/autoprohub.php' => config_path('autoprohub.php'),
        ], 'config');

        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/autoprohub'),
        ], 'views');
    }
}
