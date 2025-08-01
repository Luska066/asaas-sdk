<?php

namespace Luska066\LaravelAsaas\Core\Shared\Validator;

abstract class ValidatorHandlerAbstract
{
    /**
     * @var MessageValidatorHandler[] $messageList
     */
    private array $messageList = [];
    public function appendMessage(string $context,string $message){
        $this->messageList[] = new MessageValidatorHandler($context, $message);
    }
    public function appendValidatorHandlerMessage(ValidatorHandler $validatorHandler){
        foreach ($validatorHandler->getMessageArrayList() as $message){
            $this->messageList[] = $message;
        }
    }
    public function countListMessages(){
        return count($this->messageList) ?? 0;
    }
    public function getMessagesString(){
        $arr = [];
        foreach ($this->messageList as $message){
            $arr[] = $message->context.": ".$message->message;
        }
        return implode(",", array_reverse($arr));
    }

    /**
     * @return  MessageValidatorHandler[] $message
     */
    public function getMessageArrayList(): array{
        return $this->messageList;
    }

}
