<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker\Response;

use Jaddek\Kraken\Http\Client\Crypto;
use Jaddek\Kraken\Http\Client\Fiat;
use Jaddek\Kraken\Http\Client\Hydrator\Collection;
use Jaddek\Kraken\Http\Client\Hydrator\Item;

class PairCollection extends Collection
{
    public static function getSupportedItem(): string
    {
        return Pair::class;
    }

    public static function getItemsKey(): string
    {
        return 'result';
    }

    public function add(Item $item): void
    {
        if ($item instanceof Pair) {
            $this->collection[$item->getPairNormalized()] = $item;
        } else {
            parent::add($item);
        }
    }

    public function offsetGetByNormalizedPair(Crypto|Fiat $currency1, Crypto|Fiat $currency2): mixed
    {
        return parent::offsetGet($currency1->value.$currency2->value);
    }
}