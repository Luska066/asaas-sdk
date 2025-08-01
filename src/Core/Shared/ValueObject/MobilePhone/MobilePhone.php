<?php

namespace Luska066\LaravelAsaas\Core\Shared\ValueObject\MobilePhone;

use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;

class MobilePhone
{
    public function __construct(
        public string $value
    ) {
        $this->value = preg_replace('/\D/', '', $this->value);
    }

    public function validate(?ValidatorHandler $validatorHandler = null,array $options = []) {
        if ($validatorHandler !== null) {
            $validator = new MobilePhoneValidator($this, $validatorHandler);
            $validator->validate();
        }
        if ($validatorHandler === null) {
            $validator = new MobilePhoneValidator($this, new ValidatorHandler());
            $validator->validate();
            if($validator->hasErrors()) {
                throw new \Exception($validator->getErrors());
            }
        }
    }
}
