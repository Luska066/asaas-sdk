<?php

namespace Luska066\LaravelAsaas\Core\Shared\Validator;

use http\Exception\InvalidArgumentException;

class MessageValidatorHandler
{
    public function __construct(
        public string $context,
        public string $message
    )
    {
        if(strlen($this->context) <= 0){
            throw new \InvalidArgumentException("The context must be a non-empty string");
        }
        if(strlen($this->message) <= 0){
            throw new InvalidArgumentException("The message must be a non-empty string");
        }
    }
}
