<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Websocket;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Response extends Item
{
    /**
     * @param array<int, mixed> $error
     */
    public function __construct(
        private readonly Result $result,
        private readonly array  $error = [],
    )
    {
    }

    public function getResult(): Result
    {
        return $this->result;
    }

    public function getError(): array
    {
        return $this->error;
    }
}
