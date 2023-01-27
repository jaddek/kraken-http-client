<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker;

use Jaddek\Kraken\Http\Client\Crypto;
use Jaddek\Kraken\Http\Client\Fiat;

class RequestQuery
{
    private array $pairs = [];

    public function toQuery(): array
    {
        return ['pair' => $this->toString()];
    }

    public function toString(): string
    {
        return implode(',', array_keys($this->pairs));
    }

    public function addPair(Crypto|Fiat $from, Crypto|Fiat $to): void
    {
        $pair = sprintf('%s%s', $from->value, $to->value);

        if (!isset($this->pairs[$pair])) {
            $this->pairs[$pair] = true;
        }
    }

    public function removePair(Crypto|Fiat $from, Crypto|Fiat $to): void
    {
        $pair = sprintf('%s%s', $from->value, $to->value);

        unset($this->pairs[$pair]);
    }

    public function getPairs(): array
    {
        return $this->pairs;
    }
}