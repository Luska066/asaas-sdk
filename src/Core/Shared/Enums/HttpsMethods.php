<?php

namespace Luska066\LaravelAsaas\Core\Shared\Enums;

enum HttpsMethods:string
{

    case GET = 'get';
    case POST = 'post';
    case PUT = 'put';
    case DELETE = 'delete';
    case PATCH = 'patch';

}
