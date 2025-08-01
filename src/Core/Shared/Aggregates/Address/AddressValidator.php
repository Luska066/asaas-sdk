<?php

namespace Luska066\LaravelAsaas\Core\Shared\Aggregates\Address;

use Luska066\LaravelAsaas\Core\Shared\Validator\Validator;
use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;

/**
 * @extends Validator<Address|null>
 */
class AddressValidator extends Validator
{
    private $context = 'address';
    public function __construct(Address|null $entity, ValidatorHandler $handler)
    {
        parent::__construct($entity, $handler);
    }

    public function validate(){
        if(empty($this->entity->getLogradouro())) {
            $this->handler->appendMessage($this->context, "O logradouro nao pode ser vazio!");
        }
        if(empty($this->entity->getNumber())) {
            $this->handler->appendMessage($this->context, "O numero nao pode ser vazio!");
        }
        if(empty($this->entity->getProvince())) {
            $this->handler->appendMessage($this->context, "O bairro nao pode ser vazio!");
        }
        if(empty($this->entity->getPostalCode())) {
            $this->handler->appendMessage($this->context, "O campo postalCode nao pode ser vazio!");
        }
        if(!empty($this->entity->getPostalCode())){
            $this->entity->getPostalCode()->validate($this->handler, [
                'context' => $this->context,
                'message' => 'postalCode inválido. Formato esperado: 00000-000'
            ]);
        }
    }
}
