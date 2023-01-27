<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker;

use Jaddek\Hydrator\Item;
use Jaddek\Kraken\Http\Client\Provider\Ticker\Response\PairCollection;

class Response extends Item
{
    /**
     * @param array<int, mixed> $error
     */
    public function __construct(
        private readonly PairCollection $result,
        private readonly array          $error = [],
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
     * @return array
     */
    public function getError(): array
    {
        return $this->error;
    }
}
