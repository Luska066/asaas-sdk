<?php

namespace Luska066\LaravelAsaas\Core\Domains\Register\Factory\Customer;

class FactoryCustomerDTO
{
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
}
