<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Batch\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Item;
use Jaddek\Kraken\Http\Client\Provider\Ticker\Response\OrderCollection;

class Result extends Item
{
    public function __construct(
        private readonly OrderCollection $orders,
    )
    {

    }

    /**
     * @return OrderCollection
     */
    public function getOrders(): OrderCollection
    {
        return $this->orders;
    }
}
