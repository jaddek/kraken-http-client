<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\User\Balance\Trade;

use Jaddek\Hydrator\Item;
use Jaddek\Kraken\Http\Client\Provider\Ticker\Response\PairCollection;

class Response extends Item
{
    public function __construct(
        private readonly ?Balance $result = null,
        private readonly array   $error = [],
    )
    {

    }

    /**
     * @return null|Balance
     */
    public function getResult(): ?Balance
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
