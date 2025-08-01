<?php

namespace Luska066\LaravelAsaas\Core\Shared\Aggregates\Address;

use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;
use Luska066\LaravelAsaas\Core\Shared\ValueObject\PostalCode\PostalCode;

class Address
{
    private string|null $logradouro;
    private string|null $number;
    private string|null $complement;
    private string|null $province;
    private PostalCode $postalCode;

    public function __construct(
        string|null $logradouro,
        string|null $number,
        string|null $complement,
        string|null $province,
        PostalCode $postalCode
    )
    {
        $this->logradouro = $logradouro;
        $this->number = $number;
        $this->complement = $complement;
        $this->province = $province;
        $this->postalCode = $postalCode;
    }

    public function validate(?ValidatorHandler $validatorHandler = null) {
        if($validatorHandler !== null) {
            $validator = new AddressValidator($this, $validatorHandler);
            $validator->validate();
        }
        if($validatorHandler === null) {
            $validator = new AddressValidator($this, new ValidatorHandler());
            $validator->validate();
            if($validator->hasErrors()) {
                throw new \Exception($validator->getErrors());
            }
        }
    }

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(?string $logradouro): void
    {
        $this->logradouro = $logradouro;
    }

    public function getProvince(): ?string
    {
        return $this->province;
    }

    public function setProvince(?string $province): void
    {
        $this->province = $province;
    }

    public function getComplement(): ?string
    {
        return $this->complement;
    }

    public function setComplement(?string $complement): void
    {
        $this->complement = $complement;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    public function getPostalCode(): PostalCode
    {
        return $this->postalCode;
    }

    public function setPostalCode(PostalCode $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

}
