<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker\Pair;

use Jaddek\Hydrator\Item;

class Trade extends Item
{
    public function __construct(
        private string $price,
        private string $lotVolumes
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