<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Cancel\All;

use Jaddek\Hydrator\Item;
use Jaddek\Kraken\Http\Client\Provider\Order\Cancel\All\Response\Result;

class Response extends Item
{
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
