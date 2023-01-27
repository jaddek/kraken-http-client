<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker\Response;

use Jaddek\Hydrator\Collection;
use Jaddek\Hydrator\Item;

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
            $this->collection[$item->getPair()] = $item;
        } else {
            parent::add($item);
        }
    }
}