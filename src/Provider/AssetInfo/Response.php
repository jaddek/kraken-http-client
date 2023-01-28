<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\AssetInfo;

use Jaddek\Kraken\Http\Client\Hydrator\Item;
use Jaddek\Kraken\Http\Client\Provider\AssetInfo\Response\AssetCollection;

class Response extends Item
{
    /**
     * @param array<int, mixed> $error
     */
    public function __construct(
        private readonly AssetCollection $result,
        private readonly array           $error = [],
    )
    {
    }

    /**
     * @return AssetCollection
     */
    public function getResult(): AssetCollection
    {
        return $this->result;
    }

    /**
     * @return array<string>
     */
    public function getError(): array
    {
        return $this->error;
    }
}
