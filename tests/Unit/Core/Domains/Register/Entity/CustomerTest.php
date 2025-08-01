<?php

namespace Unit\core\Domains\Register\Entity;

use Luska066\LaravelAsaas\Core\Domains\Register\Entity\Customer\Customer;
use Luska066\LaravelAsaas\Core\Shared\Aggregates\Address\Address;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\Email\Email;
use \Luska066\LaravelAsaas\Core\Shared\ValueObject\MobilePhone\MobilePhone;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\Phone\Phone;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\PostalCode\PostalCode;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    private function ConverterExceptionMessage(string $message){
        return explode(",", $message)[0];
    }
    public function test_esperado_erro_quando_campo_nome_vazio(){
       try{
           $customer = new Customer(
               name:'',
               cpfCnpj: '85811373503',
               email:'email@email.com',
           );
           $customer->validate();
       }catch (\InvalidArgumentException $e){
           $errMessage = $this->ConverterExceptionMessage($e->getMessage());
           $this->assertEquals('customer: O campo name nao pode ser vazio!', $errMessage);
       }
    }
    public function test_esperado_erro_quando_campo_cpfCnpj_vazio(){
        try{
            $customer = new Customer(
                name:'Usuário Teste',
                cpfCnpj: '',
                email:'email@email.com',
            );
            $customer->validate();
        }catch (\InvalidArgumentException $e){
            $errMessage = $this->ConverterExceptionMessage($e->getMessage());
            $this->assertEquals("cpfCnpj: Insira um cpfCnpj válido!", $errMessage);
        }
    }

    public function test_esperado_erro_quando_campo_email_vazio(){
        try{
           $customer = new Customer(
                name:'Usuário Teste',
                cpfCnpj: '85811373503',
                email:'',
            );
            $customer->validate();
        }catch (\InvalidArgumentException $e){
            $errMessage = $this->ConverterExceptionMessage($e->getMessage());
            $this->assertEquals("email: Insira um email válido!", $errMessage);
        }
    }

    public function test_esperado_erro_quando_campo_phone_invalido(){
        try{
            $customer = new Customer(
                name:'Usuário Teste',
                cpfCnpj: '09639094013',
                email:'email@email.com',
            );
            $customer->setPhone(new Phone(''));
            $customer->validate();
        }catch (\InvalidArgumentException $e){
            $errMessage = $this->ConverterExceptionMessage($e->getMessage());
            $this->assertEquals("phone: Phone tem que ter 10 digitos!", $errMessage);
        }
    }

    public function test_esperado_erro_quando_campo_mobilePhone_invalido(){
        try{
            $customer = new Customer(
                name:'Usuário Teste',
                cpfCnpj: '09639094013',
                email:'email@email.com',
            );
            $customer->setMobilePhone(new MobilePhone(''));
            $customer->validate();
        }catch (\InvalidArgumentException $e){
            $errMessage = $this->ConverterExceptionMessage($e->getMessage());
            $this->assertEquals("mobilePhone: MobilePhone tem que ter 10 digitos!", $errMessage);
        }
    }

    public function test_esperado_erro_quando_campo_additionalEmail_invalido(){
        try{
            $customer = new Customer(
                name:'Usuário Teste',
                cpfCnpj: '09639094013',
                email:'email@email.com',
            );
            $customer->setAdditionalEmail(new Email(''));
            $customer->validate();
        }catch (\InvalidArgumentException $e){
            $errMessage = $this->ConverterExceptionMessage($e->getMessage());
            $this->assertEquals("additionalEmail: Insira um additionalEmail válido!", $errMessage);
        }
    }

    public function test_esperado_erro_quando_campo_address_invalido(){
        try{
            $customer = new Customer(
                name:'Usuário Teste',
                cpfCnpj: '09639094013',
                email:'email@email.com',
            );
            $customer->setAddress(
                new Address('','','','',new PostalCode(''))
            );
            $customer->validate();
        }catch (\InvalidArgumentException $e){
            $errMessage = $e->getMessage();
            $this->assertEquals("address: postalCode inválido. Formato esperado: 00000-000,address: O bairro nao pode ser vazio!,address: O numero nao pode ser vazio!,address: O logradouro nao pode ser vazio!", $errMessage);
        }
    }
}
