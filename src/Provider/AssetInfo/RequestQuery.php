<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\AssetInfo;

use Jaddek\Kraken\Http\Client\Crypto;

class RequestQuery
{
    private array $asset = [];

    public function toQuery(): array
    {
        return ['asset' => $this->toString()];
    }

    public function toString(): string
    {
        return implode(',', array_keys($this->asset));
    }

    public function addCoin(Crypto $coin): void
    {
        $this->asset[$coin->name] = true;
    }

    public function removePair(Crypto $coin): void
    {
        unset($this->asset[$coin->name]);
    }

    public function getAsset(): array
    {
        return $this->asset;
    }
}