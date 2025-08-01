<?php

namespace Luska066\LaravelAsaas\Core\Shared\ValueObject\MobilePhone;

use Luska066\LaravelAsaas\Core\Shared\Validator\Validator;
use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;
use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandlerAbstract;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\MobilePhone\MobilePhone;

/**
 * @extends Validator<MobilePhone|null>
 */
class MobilePhoneValidator extends Validator
{
    public function __construct(MobilePhone|null $entity, ValidatorHandler $handler)
    {
        parent::__construct($entity, $handler);
    }

    public function validate(){
        if ($this->entity === null || strlen($this->entity?->value) != 10) {
           $this->handler->appendMessage('mobilePhone',"MobilePhone tem que ter 10 digitos!");
        }
    }
}
