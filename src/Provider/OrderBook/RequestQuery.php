<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\OrderBook;

class RequestQuery
{
    public function __construct(
        /**
         * Example: pair=XBTUSD
         * Asset pairs to get data for
         */
        private readonly string $pair,

        /**
         * integer [ 1 .. 500 ]
         * Default: 100
         * Example: count=2
         * Maximum number of asks/bids
         */
        private readonly int    $count = 100,
    )
    {

    }

    public function toQuery(): array
    {
        return [
            'pair'  => $this->getPair(),
            'count' => $this->getCount(),
        ];
    }

    /**
     * @return string
     */
    public function getPair(): string
    {
        return $this->pair;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
}