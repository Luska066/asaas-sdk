<?php

namespace Luska066\LaravelAsaas\Core\Domains\Register\Repository\Customer;

use Luska066\LaravelAsaas\Core\Domains\Register\Entity\Customer\Customer;
use Luska066\LaravelAsaas\Core\Shared\Enums\HttpsMethods;
use Luska066\LaravelAsaas\Core\Shared\Interfaces\RepositoryInterface;
use Luska066\LaravelAsaas\Infra\Facades\HttpAsaas;

/**
 * @extends RepositoryInterface<Customer>
*/
class CustomerRepository implements RepositoryInterface
{

    public function findAll(array $params): array
    {
        $response = HttpAsaas::request(HttpsMethods::GET,'/customers');
        dd($response);
        return [];
    }

    public function findById($id)
    {
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id): bool
    {
        // TODO: Implement delete() method.
    }
}
