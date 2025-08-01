<?php

namespace Luska066\LaravelAsaas\Core\Shared\Enums;

enum StatusSplit:string
{
    case PENDING = 'PENDING';
    case AWAITING_CREDIT = 'AWAITING_CREDIT';
    case CANCELLED = 'CANCELLED';
    case DONE = 'DONE';
    case REFUNDED = 'REFUNDED';
    case BLOCKED_BY_VALUE_DIVERGENCE = 'BLOCKED_BY_VALUE_DIVERGENCE';
}
