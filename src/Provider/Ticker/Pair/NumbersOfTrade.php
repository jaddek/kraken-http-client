<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker\Pair;

use Jaddek\Hydrator\Item;

class NumbersOfTrade extends Item
{
    public function __construct(
        private int $today,
        private int $last24Hours
    )
    {

    }

    public function getToday(): int
    {
        return $this->today;
    }

    public function getLast24Hours(): int
    {
        return $this->last24Hours;
    }
}