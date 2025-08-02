<?php

namespace Luska066\LaravelAsaas;

use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use Luska066\LaravelAsaas\Infra\Factory\HttpAsaasFactory;

class AsaasServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Publish configuration
        $src = realpath($raw = __DIR__ . '/../config/asaas.php') ?: $raw;

        if ($this->app->runningInConsole()) {
            $this->publishes([$src => config_path('asaas.php')], 'config');
            // Uncomment if you have installation commands
            // $this->commands([AsaasInstallPackage::class]);
        }

        $this->mergeConfigFrom($src, 'asaas');

        // Load API routes
        $this->loadRoutesFrom(__DIR__.'/Http/Routes/api.php');
    }

    public function register(): void
    {
        $this->app->singleton('luska066.asaas.api', function (Container $app) {
            return new HttpAsaasFactory($app['config']['asaas'] ?? []);
        });

        // Register controller
        $this->app->make('Luska066\LaravelAsaas\Http\Controllers\Customer\CustomerController');
    }

    public function provides(): array
    {
        return [
            'luska066.asaas.api',
        ];
    }
}
