<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Single;

use Jaddek\Hydrator\Item;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Response\Result;

class Response extends Item
{
    public function __construct(
        private readonly ?Result $result = null,
        private readonly array   $error = [],
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
