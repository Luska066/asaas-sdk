<?php

namespace Luska066\LaravelAsaas\AsaasEnum;

enum HttpsMethods:string
{

    case GET = 'get';
    case POST = 'post';
    case PUT = 'put';
    case DELETE = 'delete';
    case PATCH = 'patch';

}
