<?php

namespace Luska066\LaravelAsaas\Core\Domains\Register\UseCase\Customer\Create;

use Luska066\LaravelAsaas\Core\Domains\Customer\Repository\Customer\CustomerRepositoryInterface;
use Luska066\LaravelAsaas\Core\Domains\Customer\UseCase\Customer\Create\CreateCustomerInputDTO;
use Luska066\LaravelAsaas\Core\Domains\Register\Factory\Customer\FactoryCustomer;

class CreateCustomerUseCase
{
    public function __construct(protected CustomerRepositoryInterface $repository){}

    public function execute(CreateCustomerInputDTO $input): array{
        $factoryCustomer = new FactoryCustomer(
            name: $input->name,
            cpfCnpj: $input->cpfCnpj,
            email: $input->email,
            phone: $input->phone,
            mobilePhone: $input->mobilePhone,
            address: $input->address,
            externalReference: $input->externalReference,
            notificationDisabled: $input->notificationDisabled,
            additionalEmail: $input->additionalEmail,
            municipalInscription: $input->municipalInscription,
            stateInscription: $input->stateInscription,
            observation: $input->observation,
            groupName: $input->groupName,
            company: $input->company,
            foreignCustomer: $input->foreignCustomer,
            addressLogradouro: $input->addressLogradouro,
            addressNumber: $input->addressNumber,
            addressComplement: $input->addressComplement,
            addressProvince: $input->addressProvince,
            addressPostalCode: $input->addressPostalCode,
        );
        $factoryCustomer->create();

        return $this->repository->create(
            $factoryCustomer->getCustomerArray()
        );
    }
}
