<?php

namespace Luska066\LaravelAsaas\Core\Domains\Register\Factory\Customer;


use Luska066\LaravelAsaas\Core\Domains\Register\Entity\Customer\Customer;
use Luska066\LaravelAsaas\Core\Shared\Aggregates\Address\Address;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\CpfCnpj\CpfCnpj;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\Email\Email;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\MobilePhone\MobilePhone;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\Phone\Phone;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\PostalCode\PostalCode;
use Luska066\LaravelAsaas\Core\shared\ValueObject\Uuid;

class FactoryCustomer
{
    public Customer $customer;

    public function create(FactoryCustomerDTO $dto): Customer
    {
        $this->customer = new Customer(
            name: $dto->name,
            cpfCnpj: $dto->cpfCnpj,
            email: $dto->email
        );
        $this->delegatingFields($dto);
        return $this->customer;
    }

    public function update($id,FactoryCustomerDTO $dto): Customer
    {
        $this->customer->setId($id);
        if(!empty($dto->name)){
            $this->customer->setName($dto->name);
        }
        if(!empty($dto->cpfCnpj)){
            $this->customer->setCpfCnpj(new CpfCnpj($dto->cpfCnpj));
        }
        if(!empty($dto->email)){
            $this->customer->setEmail(new Email($dto->email));
        }
        $this->delegatingFields($dto);
        return $this->customer;
    }

    public function delegatingFields(FactoryCustomerDTO $dto)
    {
        if(!empty($dto->phone)){
            $this->customer->setPhone(new Phone($dto->phone));
        }
        if(!empty($dto->mobilePhone)){
            $this->customer->setMobilePhone(new MobilePhone($dto->mobilePhone));
        }
        if(!empty($dto->additionalEmail)){
            $this->customer->setAdditionalEmail(new Email($dto->additionalEmail));
        }
        if(!empty($dto->externalReference)){
            $this->customer->setExternalReference($dto->externalReference);
        }
        if($dto->notificationDisabled != $this->customer->getNotificationDisabled()){
            $this->customer->setNotificationDisabled($dto->notificationDisabled);
        }
        if(!empty($dto->municipalInscription)){
            $this->customer->setMunicipalInscription($dto->municipalInscription);
        }
        if(!empty($dto->stateInscription)){
            $this->customer->setStateInscription($dto->stateInscription);
        }
        if(!empty($dto->observation)){
            $this->customer->setObservation($dto->observation);
        }
        if(!empty($dto->groupName)){
            $this->customer->setGroupName($dto->groupName);
        }
        if(!empty($dto->company)){
            $this->customer->setCompany($dto->company);
        }
        if($dto->foreignCustomer != $this->customer->getForeignCustomer()){
            $this->customer->setForeignCustomer($dto->foreignCustomer);
        }
        if(!empty($dto->addressLogradouro)){
            $this->customer->setAddress(new Address(
                logradouro: $dto->addressLogradouro,
                number: $dto->addressNumber,
                complement: $dto->addressComplement,
                province: $dto->addressProvince,
                postalCode: new PostalCode($dto->addressPostalCode)
            ));
        }
    }
}
