<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Hydrator;

abstract class Item implements \JsonSerializable
{
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
