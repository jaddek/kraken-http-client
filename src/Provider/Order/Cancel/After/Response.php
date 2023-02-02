<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Cancel\After;

use Jaddek\Kraken\Http\Client\Hydrator\Item;
use Jaddek\Kraken\Http\Client\Provider\Order\Cancel\After\Response\Result;

class Response extends Item
{
    /**
     * @param array<int, mixed> $error
     */
    public function __construct(
        protected readonly Result $result,
        protected readonly array  $error = [],
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
