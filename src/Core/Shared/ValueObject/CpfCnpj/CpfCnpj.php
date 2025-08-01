<?php

namespace Luska066\LaravelAsaas\Core\Shared\ValueObject\CpfCnpj;

use Luska066\LaravelAsaas\Core\Shared\Validator\ValidatorHandler;

class CpfCnpj
{
    public function __construct(
        public string $value
    ) {
        $this->value = preg_replace('/\D/', '', $this->value);
    }

    public function validate(?ValidatorHandler $validatorHandler) {
        if($validatorHandler !== null) {
            $validator = new CpfCnpjValidator($this, $validatorHandler);
            $validator->validate();
        }
        if($validatorHandler === null) {
            $validator = new CpfCnpjValidator($this, new ValidatorHandler());
            $validator->validate();
            if($validator->hasErrors()) {
                throw new \Exception($validator->getErrors());
            }
        }
    }

    public function isCpf(): bool
    {
        return strlen($this->value) === 11;
    }

    public function isCnpj(): bool
    {
        return strlen($this->value) === 14;
    }

    public function isValidCpf(): bool
    {
        if (strlen($this->value) !== 11 || preg_match('/^(\d)\1{10}$/', $this->value)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += $this->value[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($this->value[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    public function isValidCnpj(): bool
    {
        if (strlen($this->value) !== 14 || preg_match('/^(\d)\1{13}$/', $this->value)) {
            return false;
        }

        $multiplicadores1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $multiplicadores2 = [6] + $multiplicadores1;

        for ($i = 0; $i < 2; $i++) {
            $soma = 0;
            $multiplicadores = $i === 0 ? $multiplicadores1 : $multiplicadores2;

            for ($j = 0; $j < count($multiplicadores); $j++) {
                $soma += $this->value[$j] * $multiplicadores[$j];
            }

            $resto = $soma % 11;
            $digito = $resto < 2 ? 0 : 11 - $resto;

            if ($this->value[12 + $i] != $digito) {
                return false;
            }
        }

        return true;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
