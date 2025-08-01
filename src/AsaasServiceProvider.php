<?php

namespace Luska066\LaravelAsaas;

use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use Luska066\LaravelAsaas\Infra\Factory\HttpAsaasFactory;

class AsaasServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
//        $src = realpath($raw = __DIR__ . '/../config/asaas.php') ?: $raw;
//
//        if ($this->app->runningInConsole()) {
//            $this->publishes([$src => config_path('asaas.php')], 'config');
//            $this->commands([
//                AsaasInstallPackage::class,
//            ]);
//        }
//
//        $this->mergeConfigFrom($src, 'asaas');
    }

    public function register(): void
    {
        $this->app->singleton('luska066.api.asaas', function (Container $app) {
            return new HttpAsaasFactory($app['config']['asaas'] ?? []);
        });
//        $this->app->singleton('jetimob.asaas', function (Container $app) {
//            return new Asaas($app['config']['asaas'] ?? []);
//        });
//
//        $this->app->alias('jetimob.asaas', Asaas::class);
    }

    public function provides(): array
    {
        return [
            'luska066.laravel-asaas',
            'luska066.api.asaas',
        ];
    }
}
