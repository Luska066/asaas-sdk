<?php

namespace Luska066\LaravelAsaas\Factory;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Luska066\LaravelAsaas\AsaasEnum\HttpsMethods;

class HttpAsaasFactory
{
    protected Http|PendingRequest $client;
    protected array $config;

    public function __construct(array $config = [])
    {
        $this->client = Http::baseUrl(env('ASAAS_BASE_URL', 'https://www.asaas.com/api/v3'))
            ->withHeaders([
                'Content-Type' => 'application/json',
                'User-Agent' => env('APP_NAME', 'Aplicação Laravel Desconhecida'),
                'access_token' => env('ASAAS_ACCESS_TOKEN', '')
            ]);
        $this->config = $config;
    }

    public function request(HttpsMethods $method, string $uri, array $options = []): Http|PendingRequest
    {
        switch ($method) {
            case HttpsMethods::GET:
            case HttpsMethods::DELETE:
                return $this->client->{$method->value}($uri, null)->json();
            default:
                return $this->client->{$method->value}($uri, $options)->json();
        }
    }

    public function getHttpInstance(): Http|PendingRequest
    {
        return $this->client;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}
