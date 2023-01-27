<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

trait JsonTrait
{
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

}