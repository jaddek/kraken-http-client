<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Cancel\After;

class RequestBody implements \JsonSerializable
{
    public function __construct(
    )
    {
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}