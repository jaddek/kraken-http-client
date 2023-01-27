<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add;

enum EnumOrderType: string
{
    case MARKET = 'market';
    case LIMIT = 'limit';
    case STOP_LOSS = 'stop-loss';
    case TAKE_PROFIT = 'take-profit';
    case STOP_LOSS_LIMIT = 'stop-loss-limit';
    case TAKE_PROFIT_LIMIT = 'take-profit-limit';
    case SETTLE_POSITION = 'settle-position';
}