<?php

namespace Luska066\LaravelAsaas\Infra\Factory;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Luska066\LaravelAsaas\Core\Shared\Enums\HttpsMethods;
use Illuminate\Http\Client\RequestException;
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

    public function request(HttpsMethods $method, string $uri, array $options = []): array
    {
        try {
            $response = match ($method) {
                HttpsMethods::GET, HttpsMethods::DELETE => $this->client->{$method->value}($uri),
                default => $this->client->{$method->value}($uri, $options),
            };
            $response->throw();
            return [
                'success' => true,
                'status' => $response->status(),
                'data' => $response->json(),
            ];
        } catch (RequestException $e) {
            return [
                'success' => false,
                'status' => $e->response?->status() ?? 500,
                'message' => $e->getMessage(),
                'data' => $e->response?->json() ?? null,
            ];
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'status' => 500,
                'message' => 'Erro inesperado: ' . $e->getMessage(),
                'data' => null,
            ];
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
