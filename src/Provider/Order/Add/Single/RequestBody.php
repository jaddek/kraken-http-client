<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Single;

use Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Request\Order;
use Jaddek\Kraken\Http\Client\RequestBody as BaseRequestBody;

class RequestBody extends BaseRequestBody
{
    public function __construct(
        /**
         * Mixin order object
         */
        protected readonly Order   $order,

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

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function toArrayWithSubOrder(bool $withoutNulls = true): array
    {
        $data  = $this->toArray();
        $order = $data['order'] ?? null;
        $data  = array_merge($data, $order);
        unset($data['order']);

        return $data;
    }
}