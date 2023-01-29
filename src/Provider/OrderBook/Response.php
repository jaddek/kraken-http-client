<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\OrderBook;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Response extends Item
{
    /**
     * @param array<int, mixed> $error
     * @param array<string, array<string, array<int, array<int, string>>>> $result
     */
    public function __construct(
        private readonly array $result,
        private readonly array $error = [],
    )
    {
    }

    public function getResult(): array
    {
        return $this->result;
    }

    public function getError(): array
    {
        return $this->error;
    }
}
