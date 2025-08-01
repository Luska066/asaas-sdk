<?php

namespace Luska066\LaravelAsaas\Core\Shared\ValueObject\Phone;

use Luska066\LaravelAsaas\Core\Shared\Validator\Validator;
use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;

/**
 * @extends Validator<Phone|null>
 */
class PhoneValidator extends Validator
{
    public function __construct(Phone|null $entity, ValidatorHandler $handler)
    {
        parent::__construct($entity, $handler);
    }

    public function validate(){
        if ($this->entity === null || strlen($this->entity?->value) != 10) {
           $this->handler->appendMessage('phone',"Phone tem que ter 10 digitos!");
        }
    }
}
