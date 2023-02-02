<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\TradableAssetPairs;

use Jaddek\Kraken\Http\Client\Hydrator\Item;
use Jaddek\Kraken\Http\Client\Provider\TradableAssetPairs\Response\PairCollection;

class Response extends Item
{
    /**
     * @param array<int, mixed> $error
     */
    public function __construct(
        protected readonly PairCollection $result,
        protected readonly array          $error = [],
    )
    {
    }

    /**
     * @return PairCollection
     */
    public function getResult(): PairCollection
    {
        return $this->result;
    }

    /**
     * @return array<string>
     */
    public function getError(): array
    {
        return $this->error;
    }
}
