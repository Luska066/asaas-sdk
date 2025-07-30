<?php

namespace Luska066\LaravelAsaas\Core\Shared\Roots;

abstract class UseCaseRoot
{
    public function execute(\stdClass $input): \stdClass{}
}
