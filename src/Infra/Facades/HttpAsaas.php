<?php

namespace Luska066\LaravelAsaas\Infra\Facades;

use Illuminate\Support\Facades\Facade;
use Luska066\LaravelAsaas\Core\Shared\Enums\HttpsMethods;
use Luska066\LaravelAsaas\Infra\Factory\HttpAsaasFactory;

/**
 * @method static array request(HttpsMethods $method,string $uri, array $query = []): array
 * @method static HttpAsaasFactory getHttpInstance()
 * @method static HttpAsaasFactory getConfig()
 */
class HttpAsaas extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'luska066.api.asaas';
    }
}
