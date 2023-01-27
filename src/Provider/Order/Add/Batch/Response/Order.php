<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Response;

use Jaddek\Hydrator\Item;

class Order extends Item
{
    public function __construct(
        private readonly string $order,
        private readonly string $close,
        private readonly string $txid,
    )
    {

    }

    /**
     * @return string
     */
    public function getOrder(): string
    {
        return $this->order;
    }

    /**
     * @return string
     */
    public function getClose(): string
    {
        return $this->close;
    }

    /**
     * @return string
     */
    public function getTxid(): string
    {
        return $this->txid;
    }
}
