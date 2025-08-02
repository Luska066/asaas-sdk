<?php

namespace Luska066\LaravelAsaas\Core\Domains\Register\Repository\Customer;

use Luska066\LaravelAsaas\Core\Domains\Customer\Repository\Customer\CustomerRepositoryInterface;
use Luska066\LaravelAsaas\Core\Domains\Customer\Repository\Customer\RepositoryInterface;
use Luska066\LaravelAsaas\Core\Domains\Register\Entity\Customer\Customer;
use Luska066\LaravelAsaas\Core\Shared\Enums\HttpsMethods;
use Luska066\LaravelAsaas\Infra\Facades\HttpAsaas;

/**
 * @extends CustomerRepositoryInterface<Customer>
*/
class CustomerRepository implements CustomerRepositoryInterface
{
    public function findAll(array $params): array
    {
        return HttpAsaas::request(HttpsMethods::GET,'/customers');;
    }

    public function findById($id)
    {
        return HttpAsaas::request(HttpsMethods::GET,'/customers/'.$id);
    }

    public function create(array $data)
    {
        return HttpAsaas::request(HttpsMethods::POST,'/customers',$data);
    }

    public function update($id, array $data)
    {
        return HttpAsaas::request(HttpsMethods::POST,'/customers/'.$id,$data);
    }

    public function delete($id): bool
    {
        $response = HttpAsaas::request(HttpsMethods::DELETE,'/customers/'.$id);
        return false;
    }
}
