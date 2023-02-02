<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Single;

use Jaddek\Kraken\Http\Client\Hydrator\Item;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Response\Result;

class Response extends Item
{
    /**
     * @param array<int, mixed> $error
     */
    public function __construct(
        protected readonly ?Result $result = null,
        protected readonly array   $error = [],
    )
    {

    }

    /**
     * @return Result|null
     */
    public function getResult(): ?Result
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
