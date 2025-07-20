<?php

namespace Luska066\LaravelAsaas\Facades;

use Illuminate\Support\Facades\Facade;
use Luska066\LaravelAsaas\AsaasEnum\HttpsMethods;
use Luska066\LaravelAsaas\Factory\HttpAsaasFactory;

/**
 * @method static HttpAsaasFactory request(HttpsMethods $method,string $uri, array $query = [])
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
