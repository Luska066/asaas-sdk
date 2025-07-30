<?php

namespace Luska066\LaravelAsaas\Core\Shared\Validator;

/**
 * @template TEntity of \stdClass
 */
abstract class Validator
{
    /**
     * @param TEntity $entity
     */
    public function __construct(
        protected object $entity,
        protected ValidatorHandler $handler
    )
    {
    }

    public function validate(){}

    public function hasErrors(){
        return $this->handler->countListMessages() > 0;
    }

    public function getErrors(){
        return $this->handler->getMessagesString();
    }

    static function mapperToStdClass($class){

    }

    public function getHandler(){
        return $this->handler;
    }
}
