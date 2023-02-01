<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Cancel\Single;
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