<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Volume extends Item
{
    public function __construct(
        private string $today,
        protected string $last24Hours,
    ) {
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