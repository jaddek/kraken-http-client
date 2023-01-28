<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Edit;

use Jaddek\Kraken\Http\Client\Hydrator\Item;
use Jaddek\Kraken\Http\Client\Provider\Order\Edit\Response\Result;

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

    /**
     * @return Result
     */
    public function getResult(): Result
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
