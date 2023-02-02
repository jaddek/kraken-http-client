<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Batch\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Order extends Item
{
    public function __construct(
        protected readonly string $order,
        protected readonly string $close,
        protected readonly string $txid,
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
