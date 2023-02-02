<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Trade extends Item
{
    public function __construct(
        protected string $price,
        protected string $lotVolumes
    )
    {

    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getLotVolumes(): string
    {
        return $this->lotVolumes;
    }
}