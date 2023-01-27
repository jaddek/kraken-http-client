<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Batch;

use Jaddek\Kraken\Http\Client\Crypto;
use Jaddek\Kraken\Http\Client\Fiat;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Batch\Request\Order;
use Jaddek\Kraken\Http\Client\RequestBody as BaseRequestBody;

class RequestBody extends BaseRequestBody
{
    public function __construct(
        /** @var array<Order> $orders */
        protected readonly array   $orders,

        /**
         * string
         * Asset pair id or altname
         * @see Fiat
         * @see Crypto
         */
        protected readonly string  $pair,

        /**
         * string
         * RFC3339 timestamp (e.g. 2021-04-01T00:18:45Z) after which the matching engine
         * should reject the new order request, in presence of latency or order queueing.
         * min now() + 2 seconds, max now() + 60 seconds.
         */
        protected readonly ?string $deadline = null,

        /**
         * boolean
         * Validate inputs only. Do not submit order.
         */
        protected readonly ?bool   $validate = null,
    )
    {

    }

    public function getOrders(): array
    {
        return $this->orders;
    }

    public function getPair(): string
    {
        return $this->pair;
    }


    public function getDeadline(): ?string
    {
        return $this->deadline;
    }

    public function isValidate(): ?bool
    {
        return $this->validate;
    }
}