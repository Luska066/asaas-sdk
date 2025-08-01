<?php

namespace Luska066\LaravelAsaas\Core\Shared\ValueObject\Email;

use Luska066\LaravelAsaas\Core\Shared\Validator\Validator;
use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;
use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandlerAbstract;
use \Luska066\LaravelAsaas\Core\Shared\ValueObject\Email\Email;

/**
 * @extends Validator<Email|null>
 */
class EmailValidator extends Validator
{
    public function __construct(Email|null $entity, ValidatorHandler $handler)
    {
        parent::__construct($entity, $handler);
    }

    public function validate($context = 'email', $message = 'Insira um email válido!')
    {
        if (!filter_var($this->entity?->value, FILTER_VALIDATE_EMAIL)) {
            $this->handler->appendMessage($context, $message);
        }
    }
}
