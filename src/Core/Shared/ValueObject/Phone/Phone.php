<?php

namespace Luska066\LaravelAsaas\Core\Shared\ValueObject\Phone;

use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;

class Phone
{
    public function __construct(
        public string $value
    ) {
        $this->value = preg_replace('/\D/', '', $this->value);
    }

    public function validate(?ValidatorHandler $validatorHandler = null){
        if ($validatorHandler !== null) {
            $validator = new PhoneValidator($this, $validatorHandler);
            $validator->validate();
        }
        if ($validatorHandler === null) {
            $validator = new PhoneValidator($this, new ValidatorHandler());
            $validator->validate();
            if($validator->hasErrors()) {
                throw new \Exception($validator->getErrors());
            }
        }
    }
}
