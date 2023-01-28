<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\User\Balance\Trade;


use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Response extends Item
{
    /**
     * @param array<int, mixed> $error
     */
    public function __construct(
        private readonly ?Balance $result = null,
        private readonly array   $error = [],
    )
    {

    }

    /**
     * @return Balance|null
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
