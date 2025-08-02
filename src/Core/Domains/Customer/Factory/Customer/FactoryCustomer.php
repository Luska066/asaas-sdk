<?php

namespace Luska066\LaravelAsaas\Core\Domains\Register\Factory\Customer;


use Luska066\LaravelAsaas\Core\Domains\Register\Entity\Customer\Customer;
use Luska066\LaravelAsaas\Core\Shared\Aggregates\Address\Address;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\CpfCnpj\CpfCnpj;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\Email\Email;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\MobilePhone\MobilePhone;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\Phone\Phone;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\PostalCode\PostalCode;

class FactoryCustomer
{
    public Customer $customer;

    public function __construct(
        public string  $name,
        public string  $cpfCnpj,
        public string  $email,
        public ?string $phone = null,
        public ?string $mobilePhone = null,
        public ?string $address = null,
        public ?string $externalReference = null,
        public ?bool   $notificationDisabled = false,
        public ?string $additionalEmail = null,
        public ?string $municipalInscription = null,
        public ?string $stateInscription = null,
        public ?string $observation = null,
        public ?string $groupName = null,
        public ?string $company = null,
        public ?bool   $foreignCustomer = false,
        public ?string $addressLogradouro = '',
        public ?string $addressNumber = '',
        public ?string $addressComplement = '',
        public ?string $addressProvince = '',
        public ?string $addressPostalCode = '',
    ){}
    public function create(): Customer
    {
        $this->customer = new Customer(
            name: $this->name,
            cpfCnpj: $this->cpfCnpj,
            email: $this->email
        );
        $this->delegatingFields($this);
        return $this->customer;
    }

    public function update($id): Customer
    {
        $this->customer->setId($id);
        if(!empty($this->name)){
            $this->customer->setName($this->name);
        }
        if(!empty($this->cpfCnpj)){
            $this->customer->setCpfCnpj(new CpfCnpj($this->cpfCnpj));
        }
        if(!empty($this->email)){
            $this->customer->setEmail(new Email($this->email));
        }
        $this->delegatingFields($this);
        return $this->customer;
    }

    public function delegatingFields()
    {
        if(!empty($this->phone)){
            $this->customer->setPhone(new Phone($this->phone));
        }
        if(!empty($this->mobilePhone)){
            $this->customer->setMobilePhone(new MobilePhone($this->mobilePhone));
        }
        if(!empty($this->additionalEmail)){
            $this->customer->setAdditionalEmail(new Email($this->additionalEmail));
        }
        if(!empty($this->externalReference)){
            $this->customer->setExternalReference($this->externalReference);
        }
        if($this->notificationDisabled != $this->customer->getNotificationDisabled()){
            $this->customer->setNotificationDisabled($this->notificationDisabled);
        }
        if(!empty($this->municipalInscription)){
            $this->customer->setMunicipalInscription($this->municipalInscription);
        }
        if(!empty($this->stateInscription)){
            $this->customer->setStateInscription($this->stateInscription);
        }
        if(!empty($this->observation)){
            $this->customer->setObservation($this->observation);
        }
        if(!empty($this->groupName)){
            $this->customer->setGroupName($this->groupName);
        }
        if(!empty($this->company)){
            $this->customer->setCompany($this->company);
        }
        if($this->foreignCustomer != $this->customer->getForeignCustomer()){
            $this->customer->setForeignCustomer($this->foreignCustomer);
        }
        if(!empty($this->addressLogradouro)){
            $this->customer->setAddress(new Address(
                logradouro: $this->addressLogradouro,
                number: $this->addressNumber,
                complement: $this->addressComplement,
                province: $this->addressProvince,
                postalCode: new PostalCode($this->addressPostalCode)
            ));
        }
    }

    public function getCustomerArray(){
        $data = [
            'name' => $this->name,
            'cpfCnpj' => $this->cpfCnpj,
            'email' => $this->email,
            'phone' => $this->phone,
            'mobilePhone' => $this->mobilePhone,
            'externalReference' => $this->externalReference,
            'notificationDisabled' => $this->notificationDisabled,
            'additionalEmail' => $this->additionalEmail,
            'municipalInscription' => $this->municipalInscription,
            'stateInscription' => $this->stateInscription,
            'observation' => $this->observation,
            'groupName' => $this->groupName,
            'company' => $this->company,
            'foreignCustomer' => $this->foreignCustomer,
            'address' => $this->addressLogradouro,
            'addressNumber' => $this->addressNumber,
            'complement' => $this->addressComplement,
            'province' => $this->addressProvince,
            'postalCode' => $this->addressPostalCode
        ];
        return array_filter($data, fn ($value) => $value != null);
    }
}
