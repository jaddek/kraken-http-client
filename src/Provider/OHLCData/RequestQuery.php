<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\OHLCData;

class RequestQuery
{
    public function __construct(
        /**
         * Example: pair=XBTUSD
         * Asset pairs to get data for
         */
        private readonly string        $pair,

        /**
         * optional
         *
         * Default: 1
         *
         * Enum: 1 5 15 30 60 240 1440 10080 21600
         * Example: interval=60
         * Time frame interval in minutes
         *
         */
        private readonly ?IntervalEnum $interval = null,

        /**
         * optional
         *
         * Example: since=1548111600
         * Return up to 720 OHLC data points since given timestamp
         */
        private readonly ?int          $since = null,
    )
    {

    }

    public function toQuery(): array
    {
        return array_filter([
            'pair'     => $this->getPair(),
            'interval' => $this->getInterval()?->value,
            'since'    => $this->getSince(),
        ], fn($value) => $value !== null);
    }

    public function getInterval(): ?IntervalEnum
    {
        return $this->interval;
    }

    public function getSince(): ?int
    {
        return $this->since;
    }

    /**
     * @return string
     */
    public function getPair(): string
    {
        return $this->pair;
    }
}