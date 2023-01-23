<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker\Pair;

use Jaddek\Hydrator\Item;

class Ask extends Item
{
    public function __construct(
        protected string $price,
        protected string $wholeLotVolume,
        protected string $lotVolume,
    )
    {
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getWholeLotVolume(): string
    {
        return $this->wholeLotVolume;
    }

    public function getLotVolume(): string
    {
        return $this->lotVolume;
    }
}
