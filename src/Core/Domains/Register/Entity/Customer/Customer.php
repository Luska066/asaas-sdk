<?php

namespace Luska066\LaravelAsaas\Core\Entity\Customer;

use Luska066\LaravelAsaas\Core\Domains\Register\Validators\CustomerValidator;
use Luska066\LaravelAsaas\Core\shared\EntityRoot;
use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;

class Customer extends EntityRoot
{
    private string $name;
    private CpfCnpj $cpfCnpj;
    private Email $email;
    private Phone $phone;
    private MobilePhone $phone;
    private Address $address ;
    private string $externalReference;
    private bool $notificationDisabled = false;
    private Email $additionalEmail;
    private string $municipalInscription;
    private string $stateInscription;
    private string $observation;
    private string $groupName;
    private string $company;
    private bool $foreignCustomer = false;


    public function validate(){
        $customerValidator = new CustomerValidator($this,new ValidatorHandler::class);
        $customerValidator->validate();
    }
}
