<?php

namespace Luska066\LaravelAsaas\Core\Shared\Roots;

use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\Uuid;

class EntityRoot extends \stdClass
{
    private string $id;
    protected ?ValidatorHandler $validator = null;

    public function __construct(string $uuid)
    {
        $this->id = new Uuid($uuid)->getUuid();
        $this->validator = new ValidatorHandler();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = new Uuid($id)->getUuid();
    }


}
