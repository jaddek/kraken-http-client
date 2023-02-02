<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Edit\Request;

use Jaddek\Kraken\Http\Client\JsonTrait;

class Description implements \JsonSerializable
{
    use JsonTrait;

    public function __construct(
        /**
         * string
         * Order description
         */
        private readonly string $order
    )
    {
    }

    public function getOrder(): string
    {
        return $this->order;
    }
}
