<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Collection;
use Jaddek\Kraken\Http\Client\Hydrator\Item;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Response\Order;

class OrderCollection extends Collection
{
    public static function getSupportedItem(): string
    {
        return Order::class;
    }

    public static function getItemsKey(): string
    {
        return 'orders';
    }
}