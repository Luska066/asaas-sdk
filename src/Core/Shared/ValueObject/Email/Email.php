<?php

namespace Luska066\LaravelAsaas\Core\Shared\ValueObject\Email;

use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;

class Email
{
    public function __construct(
        public string $value
    ) {}

    public function validate(?ValidatorHandler $validatorHandler = null, $options = [
        'context' => 'email',
        'message' => 'Insira um email válido!'
    ]) {
        if($validatorHandler !== null) {
            $validator = new EmailValidator($this, $validatorHandler);
            $validator->validate($options['context'], $options['message']);
        }
        if($validatorHandler === null) {
            $validator = new EmailValidator($this, new ValidatorHandler());
            $validator->validate($options['context'], $options['message']);
            if($validator->hasErrors()) {
                throw new \Exception($validator->getErrors());
            }
        }

    }
}
