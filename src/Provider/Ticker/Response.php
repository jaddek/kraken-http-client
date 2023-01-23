<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker;

use Jaddek\Hydrator\Item;
use Jaddek\Kraken\Http\Client\Provider\Ticker\Pair\PairCollection;

class Response extends Item
{
    public function __construct(
        private PairCollection $result,
        private array          $error = [],
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
