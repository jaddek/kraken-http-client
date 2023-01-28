<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Status;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Result extends Item
{
    public function __construct(
        private readonly string $status,
        /** Current timestamp (RFC3339) */
        private readonly string $timestamp,
    )
    {

    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return StatusEnum
     */
    public function getStatusEnum(): StatusEnum
    {
        return StatusEnum::from($this->status);
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }
}