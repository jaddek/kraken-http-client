<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\OHLCData;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Response extends Item
{
    public function __construct(
        /**
         * @var array<int, array<string, array<int, array<int, mixed>>>> $result
         */
        private readonly array $result,

        /**
         * @var array<int, mixed> $error
         */
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
