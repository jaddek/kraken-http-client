<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Edit;

use Jaddek\Kraken\Http\Client\Provider\Order\Edit\Request\Order;
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
         * Used to interpret if client wants to receive pending replace, before the order is completely replaced
         */
        protected readonly ?bool   $cancel_response,

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

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function getPair(): string
    {
        return $this->pair;
    }

    public function getCancelResponse(): ?bool
    {
        return $this->cancel_response;
    }

    public function getDeadline(): ?string
    {
        return $this->deadline;
    }

    public function getValidate(): ?bool
    {
        return $this->validate;
    }

    public function toArrayWithSubOrder(bool $withoutNulls = true): array
    {
        $data  = $this->toArray();
        $order = $data['order'] ?? [];
        $data  = array_merge($data, $order);
        unset($data['order']);

        return $data;
    }
}