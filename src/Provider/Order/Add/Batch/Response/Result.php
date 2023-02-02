<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Batch\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Result extends Item
{
    public function __construct(
        protected readonly OrderCollection $orders,
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
