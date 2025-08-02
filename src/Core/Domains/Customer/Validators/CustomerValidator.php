<?php

namespace Luska066\LaravelAsaas\Core\Domains\Register\Validators;

use Luska066\LaravelAsaas\Core\Domains\Register\Entity\Customer\Customer;
use Luska066\LaravelAsaas\Core\Shared\Aggregates\Address\Address;
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
        if (empty($this->entity->getName())) $this->handler->appendMessage($this->context, "O campo name nao pode ser vazio!");
        $this->entity->getCpfCnpj()->validate($this->getHandler());
        $this->entity->getEmail()->validate($this->getHandler());
        if ($this->hasErrors()) {
            throw new \InvalidArgumentException($this->getErrors());
        }
    }

}
