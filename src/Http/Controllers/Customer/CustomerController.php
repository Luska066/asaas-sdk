<?php

namespace Luska066\LaravelAsaas\Http\Controllers\Customer;

use Asaas\Core\Domains\Customer\UseCase\Customer\Delete\DeleteCustomerUseCase;
use Asaas\Core\Domains\Customer\UseCase\Customer\Find\FindCustomerUseCase;
use Asaas\Core\Domains\Customer\UseCase\Customer\List\ListCustomersUseCase;
use Asaas\Core\Domains\Customer\UseCase\Customer\Update\UpdateCustomerInput;
use Asaas\Core\Domains\Customer\UseCase\Customer\Update\UpdateCustomerUseCase;
use Asaas\Http\Requests\CustomerRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Luska066\LaravelAsaas\Core\Domains\Customer\UseCase\Customer\Create\CreateCustomerInputDTO;
use Luska066\LaravelAsaas\Core\Domains\Register\Repository\Customer\CustomerRepository;
use Luska066\LaravelAsaas\Core\Domains\Register\UseCase\Customer\Create\CreateCustomerUseCase;
use Luska066\LaravelAsaas\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function __construct(
        private CreateCustomerUseCase $createCustomerUseCase,
    ) {
        $this->createCustomerUseCase = new CreateCustomerUseCase(new CustomerRepository());
    }

    /**
     * Display a listing of customers.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);
        $customers = $this->listCustomersUseCase->execute($perPage, $page);

        return $this->success($customers);
    }

    /**
     * Store a newly created customer.
     */
    public function store(CustomerRequest $request): JsonResponse
    {
        try {
            $input = new CreateCustomerInputDTO(
                name: $request->input('name'),
                cpfCnpj: $request->input('cpfCnpj'),
                email: $request->input('email'),
                phone: $request->input('phone'),
                mobilePhone: $request->input('mobilePhone'),
                address: $request->input('address'),
                externalReference: $request->input('externalReference'),
                notificationDisabled: $request->input('notificationDisabled'),
                additionalEmail: $request->input('additionalEmail'),
                municipalInscription: $request->input('municipalInscription'),
                stateInscription: $request->input('stateInscription'),
                observation: $request->input('observation'),
                groupName: $request->input('groupName'),
                company: $request->input('company'),
                foreignCustomer: $request->input('foreignCustomer'),
                addressLogradouro: $request->input('addressLogradouro'),
                addressNumber: $request->input('addressNumber'),
                addressComplement: $request->input('addressComplement'),
                addressProvince: $request->input('addressProvince'),
                addressPostalCode: $request->input('addressPostalCode'),
            );
            $customer = $this->createCustomerUseCase->execute($input);
            return $this->success($customer, 'Customer created successfully', 201);
        } catch (\Exception $e) {
            return $this->error('Failed to create customer: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Display the specified customer.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $customer = $this->findCustomerUseCase->execute($id);
            return $this->success($customer);
        } catch (\Exception $e) {
            return $this->error('Customer not found', 404);
        }
    }

    /**
     * Update the specified customer.
     */
    public function update(CustomerRequest $request, string $id): JsonResponse
    {
        try {
            $input = new UpdateCustomerInput(
                id: $id,
                name: $request->input('name'),
                email: $request->input('email'),
                phone: $request->input('phone'),
                mobilePhone: $request->input('mobile_phone'),
                cpfCnpj: $request->input('cpf_cnpj'),
                postalCode: $request->input('postal_code'),
                address: $request->input('address'),
                addressNumber: $request->input('address_number'),
                complement: $request->input('complement'),
                province: $request->input('province'),
                externalReference: $request->input('external_reference'),
                notificationDisabled: $request->input('notification_disabled', false),
                additionalEmails: $request->input('additional_emails', []),
                municipalInscription: $request->input('municipal_inscription'),
                stateInscription: $request->input('state_inscription'),
                observations: $request->input('observations')
            );

            $customer = $this->updateCustomerUseCase->execute($input);

            return $this->success($customer, 'Customer updated successfully');
        } catch (\Exception $e) {
            return $this->error('Failed to update customer: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified customer.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $this->deleteCustomerUseCase->execute($id);
            return $this->success(null, 'Customer deleted successfully', 204);
        } catch (\Exception $e) {
            return $this->error('Failed to delete customer: ' . $e->getMessage(), 500);
        }
    }
}
