<?php

namespace Luska066\LaravelAsaas\Core\shared\ValueObject;

use Ramsey\Uuid\Uuid as UuidPkg;

class Uuid
{
    private string $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = empty($uuid) ? UuidPkg::uuid4()->toString() : $uuid;
        if (!UuidPkg::isValid($this->uuid)) {
            throw new \Exception('Uuid Is Inválid, required uuid7() ramsey/uuid');
        };
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function __toString(): string
    {
        return $this->uuid;
    }

}
