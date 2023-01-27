<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add;

enum EnumOrderTrigger: string
{
    case INDEX = 'index';
    case LAST = 'last';
}