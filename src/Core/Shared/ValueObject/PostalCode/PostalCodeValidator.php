<?php

namespace Luska066\LaravelAsaas\Core\Shared\ValueObject\PostalCode;

use Luska066\LaravelAsaas\Core\Shared\Validator\Validator;
use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;

/**
 * @extends Validator<PostalCode>
*/
class PostalCodeValidator extends Validator
{
    public function __construct(PostalCode|null $entity, ValidatorHandler $handler)
    {
        parent::__construct($entity, $handler);
    }

    public function validate(string $context = 'postalCode',string $messsage = "postalCode inválido. Formato esperado: 00000-000."){
        if ($this->entity === null || !preg_match('/^\d{5}-\d{3}$/', $this->entity->value)) {
            $this->handler->appendMessage($context, $messsage);
        }
    }
}
