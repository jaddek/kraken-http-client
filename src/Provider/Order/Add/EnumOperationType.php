<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add;

enum EnumOperationType: string
{
    case SELL = 'sell';
    case BUY = 'buy';
}