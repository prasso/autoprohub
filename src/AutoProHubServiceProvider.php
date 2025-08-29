<?php

namespace Prasso\AutoProHub;

use Illuminate\Support\ServiceProvider;
use Filament\FilamentServiceProvider;
use Filament\Facades\Filament;
use Prasso\AutoProHub\Support\Facades\AutoProHubPanel;
use Prasso\AutoProHub\Filament\Pages;
use Prasso\AutoProHub\Filament\Resources;
use Livewire\Livewire;

class AutoProHubServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Merge config
        $this->mergeConfigFrom(
            __DIR__.'/../config/autoprohub.php', 'autoprohub'
        );
        
        // Register services
        $this->app->scoped('autoprohub', function (): AutoProHubPanelManager {
            return new AutoProHubPanelManager();
        });
    }

    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        
        // Check if API routes exist and load them
        if (file_exists(__DIR__.'/../routes/api.php')) {
            $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        }

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
        
        // During unit tests we don't need Filament panel or Livewire components registered.
        if (!app()->runningUnitTests()) {
            // Register Filament resources when they are created
            Filament::registerResources(AutoProHubPanel::getAutoProHubResources());
            
            // Register Livewire components
            Livewire::component('prasso.autoprohub.filament.resources.customer-resource.pages.list-customers', 
                \Prasso\AutoProHub\Filament\Resources\CustomerResource\Pages\ListCustomers::class);
            Livewire::component('prasso.autoprohub.filament.resources.customer-resource.pages.create-customer', 
                \Prasso\AutoProHub\Filament\Resources\CustomerResource\Pages\CreateCustomer::class);
            Livewire::component('prasso.autoprohub.filament.resources.customer-resource.pages.edit-customer', 
                \Prasso\AutoProHub\Filament\Resources\CustomerResource\Pages\EditCustomer::class);
        }
    }
}
