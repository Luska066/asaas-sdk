<?php

namespace Luska066\LaravelAsaas\Core\Domains\Register\Entity\Customer;

use Luska066\LaravelAsaas\Core\Domains\Register\Validators\CustomerValidator;
use Luska066\LaravelAsaas\Core\Shared\Aggregates\Address\Address;
use Luska066\LaravelAsaas\Core\Shared\Roots\EntityRoot;
use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\CpfCnpj\CpfCnpj;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\Email\Email;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\MobilePhone\MobilePhone;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\Phone\Phone;

class Customer extends EntityRoot
{
    protected string $name;
    protected CpfCnpj $cpfCnpj;
    protected Email $email;
    protected ?Phone $phone = null;
    protected ?MobilePhone $mobilePhone = null;
    protected ?Address $address = null;
    protected ?string $externalReference = null;
    protected ?bool $notificationDisabled = false;
    protected ?Email $additionalEmail = null;
    protected ?string $municipalInscription = null;
    protected ?string $stateInscription = null;
    protected ?string $observation = null;
    protected ?string $groupName = null;
    protected ?string $company = null;
    protected ?bool $foreignCustomer = false;

    public function __construct(string $name, string $cpfCnpj, string $email)
    {
        parent::__construct('');
        $this->name = $name;
        $this->cpfCnpj = new CpfCnpj($cpfCnpj);
        $this->email = new Email($email);
        $this->validator = new ValidatorHandler();
    }


    public function validate(?ValidatorHandler $validatorHandler = null){
        if($validatorHandler != null){
            $this->validator = $validatorHandler;
            $customerValidator = new CustomerValidator($this,$validatorHandler);
            $customerValidator->validate();
        }
        if($validatorHandler === null){
            $customerValidator = new CustomerValidator($this,$this->validator);
            $customerValidator->validate();
        }

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
        $this->validate($this->validator);
    }

    public function getForeignCustomer(): ?bool
    {
        return $this->foreignCustomer;
    }

    public function setForeignCustomer(?bool $foreignCustomer): void
    {
        $this->foreignCustomer = $foreignCustomer;
        $this->validate($this->validator);
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): void
    {
        $this->company = $company;
        $this->validate($this->validator);
    }

    public function getGroupName(): ?string
    {
        return $this->groupName;
    }

    public function setGroupName(?string $groupName): void
    {
        $this->groupName = $groupName;
        $this->validate($this->validator);
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): void
    {
        $this->observation = $observation;
        $this->validate($this->validator);
    }

    public function getStateInscription(): ?string
    {
        return $this->stateInscription;
    }

    public function setStateInscription(?string $stateInscription): void
    {
        $this->stateInscription = $stateInscription;
        $this->validate($this->validator);
    }

    public function getMunicipalInscription(): ?string
    {
        return $this->municipalInscription;
    }

    public function setMunicipalInscription(?string $municipalInscription): void
    {
        $this->municipalInscription = $municipalInscription;
        $this->validate($this->validator);
    }

    public function getAdditionalEmail(): Email|null
    {
        return $this->additionalEmail;
    }

    public function setAdditionalEmail(?Email $additionalEmail): void
    {
        $this->additionalEmail = $additionalEmail;
        if (!empty($this->getAdditionalEmail())) $this->getAdditionalEmail()->validate($this->validator,[
            "context" => "additionalEmail",
            "message" => "Insira um additionalEmail válido!"
        ]);
    }

    public function getNotificationDisabled(): ?bool
    {
        return $this->notificationDisabled;
    }

    public function setNotificationDisabled(?bool $notificationDisabled): void
    {
        $this->notificationDisabled = $notificationDisabled;
        $this->validate($this->validator);
    }

    public function getExternalReference(): ?string
    {
        return $this->externalReference;
    }

    public function setExternalReference(?string $externalReference): void
    {
        $this->externalReference = $externalReference;
        $this->validate($this->validator);
    }

    public function getMobilePhone(): ?MobilePhone
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(?MobilePhone $mobilePhone): void
    {
        $this->mobilePhone = $mobilePhone;
        if (!empty($this->getMobilePhone()))  $this->getMobilePhone()->validate($this->validator);
    }

    public function getAddress(): Address|null
    {
        return $this->address;
    }

    public function setAddress(?Address $address): void
    {
        $this->address = $address;
        if(!empty($this->getAddress())) $this->getAddress()->validate($this->validator);
    }

    public function getPhone(): Phone|null
    {
        return $this->phone ;
    }

    public function setPhone(Phone $phone): void
    {
        $this->phone = $phone;
        if (!empty($this->getPhone())) $this->getPhone()->validate($this->validator);
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): void
    {
        $this->email = $email;
        if (!empty($this->getEmail()))  $this->getEmail()->validate($this->validator);
    }

    public function getCpfCnpj(): CpfCnpj
    {
        return $this->cpfCnpj;
    }

    public function setCpfCnpj(CpfCnpj $cpfCnpj): void
    {
        $this->cpfCnpj = $cpfCnpj;
        if (!empty($this->getCpfCnpj()))  $this->getCpfCnpj()->validate($this->validator);

    }


}
