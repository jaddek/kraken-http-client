<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker\Pair;

use Jaddek\Hydrator\Item;

class VolumeWeightedAveragePrice extends Item
{
    public function __construct(
        private string $today,
        private string $last24Hours,
    )
    {
    }

    public function getToday(): string
    {
        return $this->today;
    }

    public function getLast24Hours(): string
    {
        return $this->last24Hours;
    }
}