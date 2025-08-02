<?php

namespace Luska066\LaravelAsaas\Core\Domains\Customer\Repository\Customer;

/**
 * @template TEntity
*/
interface CustomerRepositoryInterface
{
    /**
     * @return []
     */
    public function findAll(array $params): array;

    /**
     * @param int|string $id
     * @return TEntity|null
     */
    public function findById($id);

    /**
     * @param int|string $id
     * @return array
     */
    public function create(array $data);

    /**
     * @param int|string $id
     * @param array $data
     * @return array
     */
    public function update($id, array $data);

    /**
     * @param int|string $id
     * @return bool
     */
    public function delete($id): bool;
}
