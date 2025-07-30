<?php

namespace Luska066\LaravelAsaas\Core\Domains\Register\Validators;

use Luska066\LaravelAsaas\Core\Entity\Customer\Customer;
use Luska066\LaravelAsaas\Core\Shared\Validator\Validator;
use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;

/**
 * @extends Validator<Customer>
 */
class CustomerValidator extends Validator
{
    private $context = "customer";
    public function __construct(Customer $entity, ValidatorHandler $handler)
    {
        parent::__construct($entity, $handler);
    }

    public function validate()
    {
       $this->handler->appendMessage($this->context,"Erro ao Exibir mensagem");
       if($this->hasErrors() >= 0){
           throw new \InvalidArgumentException($this->getErrors());
       }
    }

}
