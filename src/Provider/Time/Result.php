<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Time;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Result extends Item
{
    public function __construct(
        private readonly ?int    $unixtime,
        private readonly ?string $rfc1123,
    )
    {

    }

    public function getUnixtime(): ?int
    {
        return $this->unixtime;
    }

    public function getRfc1123(): ?string
    {
        return $this->rfc1123;
    }
}