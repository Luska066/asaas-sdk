<?php

namespace Luska066\LaravelAsaas\Core\Shared\ValueObject\CpfCnpj;

use Luska066\LaravelAsaas\Core\Shared\Validator\Validator;
use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;
use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandlerAbstract;

/**
 * @extends Validator<CpfCnpj>
 */
class CpfCnpjValidator extends Validator
{
    public function __construct(CpfCnpj $entity, ValidatorHandler $handler)
    {
        parent::__construct($entity, $handler);
    }

    public function validate(){
        if (!$this->entity->isValidCpf() && !$this->entity->isValidCnpj()) {
           $this->handler->appendMessage('cpfCnpj','Insira um cpfCnpj válido!');
        }
    }
}
