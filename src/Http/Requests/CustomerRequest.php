<?php

namespace Asaas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:20',
            'mobilePhone' => 'nullable|string|max:20',
            'cpfCnpj' => 'nullable|string|max:20',
            'postalCode' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:150',
            'addressNumber' => 'nullable|string|max:10',
            'complement' => 'nullable|string|max:50',
            'province' => 'nullable|string|max:100',
            'external_reference' => 'nullable|string|max:100',
            'notification_disabled' => 'sometimes|boolean',
            'additionalEmails' => 'nullable|email',
            'municipalInscription' => 'nullable|string|max:20',
            'stateInscription' => 'nullable|string|max:20',
            'observations' => 'nullable|string|max:500',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail informado não é válido.',
            'mobile_phone.required' => 'O campo celular é obrigatório.',
            'cpf_cnpj.required' => 'O campo CPF/CNPJ é obrigatório.',
            'additional_emails.*.email' => 'Os e-mails adicionais devem ser endereços de e-mail válidos.',
        ];
    }
}
