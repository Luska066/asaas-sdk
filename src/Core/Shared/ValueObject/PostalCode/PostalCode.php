<?php

namespace Luska066\LaravelAsaas\Core\Shared\ValueObject\PostalCode;

use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;

class PostalCode
{
    public function __construct(
        public string $value
    )
    {
    }

    public function validate(?ValidatorHandler $validatorHandler = null,$option = [
        'context' => 'postalCode',
        'message' => 'postalCode inválido. Formato esperado: 00000-000'
    ])
    {
        if ($validatorHandler !== null) {
            $validator = new PostalCodeValidator($this, $validatorHandler);
            $validator->validate($option['context'],$option['message']);
        }
        if ($validatorHandler === null) {
            $validator = new PostalCodeValidator($this, new ValidatorHandler());
            $validator->validate($option['context'],$option['message']);
            if($validator->hasErrors()) {
                throw new \Exception($validator->getErrors());
            }
        }
    }
}
