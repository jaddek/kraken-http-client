<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\TradableAssetPairs;

use Jaddek\Kraken\Http\Client\Crypto;
use Jaddek\Kraken\Http\Client\Fiat;

class RequestQuery
{
    /**
     * Example: pair=XXBTCZUSD,XETHXXBT
     * Asset pairs to get data for
     */
    private array $pairs = [];

    /**
     * optional
     * default = "info"
     * Info to retrieve (optional)
     */
    private ?string $info = null;

    public function toQuery(): array
    {
        return [
            'pair' => $this->toString(),
            'info' => $this->getInfo()
        ];
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

    public function getInfo(): ?string
    {
        return $this->info ?? InfoLevelsEnum::INFO->value;
    }

    public function setLevelInfo(): void
    {
        $this->info = InfoLevelsEnum::INFO->value;
    }

    public function setLevelLeverage(): void
    {
        $this->info = InfoLevelsEnum::LEVERAGE->value;
    }

    public function setLevelFees(): void
    {
        $this->info = InfoLevelsEnum::FEES->value;
    }

    public function setLevelMargin(): void
    {
        $this->info = InfoLevelsEnum::MARGIN->value;
    }
}