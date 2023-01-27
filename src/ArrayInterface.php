<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

interface ArrayInterface
{
    public function toArray(bool $withoutNulls = true): array;
}
