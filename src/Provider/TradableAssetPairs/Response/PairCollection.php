<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\TradableAssetPairs\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Collection;
use Jaddek\Kraken\Http\Client\Hydrator\Item;

class PairCollection extends Collection
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
        $index = $item instanceof Asset && !empty($item->getAltname())
            ? $item->getAltname()
            : null;

        if ($index !== null) {
            $this->collection[$index] = $item;

            return;
        }

        parent::add($item);
    }
}