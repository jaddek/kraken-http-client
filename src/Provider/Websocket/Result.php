<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Websocket;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Result extends Item
{
    public function __construct(
        private readonly string $token,
        private readonly int    $expires
    )
    {

    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getExpires(): int
    {
        return $this->expires;
    }
}