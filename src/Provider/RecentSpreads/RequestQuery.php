<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\RecentSpreads;

class RequestQuery
{
    public function __construct(
        /**
         * Example: pair=XBTUSD
         * Asset pairs to get data for
         */
        private readonly string $pair,

        /**
         * Example: since=1616663618
         * Return trade data since given timestamp
         */
        private readonly int    $since = 100,
    )
    {

    }

    public function toQuery(): array
    {
        return [
            'pair'  => $this->getPair(),
            'since' => $this->getSince(),
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
    public function getSince(): int
    {
        return $this->since;
    }
}