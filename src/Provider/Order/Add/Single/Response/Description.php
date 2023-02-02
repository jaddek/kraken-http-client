<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Description extends Item
{
    public function __construct(
        protected readonly string $order,
        protected readonly ?string $close = null,
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
     * @return string|null
     */
    public function getClose(): ?string
    {
        return $this->close;
    }
}
