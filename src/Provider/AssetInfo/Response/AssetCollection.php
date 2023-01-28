<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\AssetInfo\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Collection;
use Jaddek\Kraken\Http\Client\Hydrator\Item;

class AssetCollection extends Collection
{
    public static function getSupportedItem(): string
    {
        return Asset::class;
    }

    public static function getItemsKey(): string
    {
        return 'result';
    }

    public function add(Item $item): void
    {
        if ($item instanceof Asset) {
            $this->collection[$item->getAltname()] = $item;
        } else {
            parent::add($item);
        }
    }
}