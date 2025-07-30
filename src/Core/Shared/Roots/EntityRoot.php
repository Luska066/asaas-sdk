<?php

namespace Luska066\LaravelAsaas\Core\shared;

use Luska066\LaravelAsaas\Core\shared\ValueObject\Uuid;

class EntityRoot extends \stdClass
{
    private string $id;

    public function __construct(string $uuid)
    {
        $this->id = new Uuid($uuid)->getUuid();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }


}
