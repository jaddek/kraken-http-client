<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Item;
use Jaddek\Kraken\Http\Client\PairNormalizer;

class Pair extends Item
{
    protected readonly string $pairNormalized;

    public function __construct(
        protected readonly Ask               $a, // ASK
        protected readonly Bid                        $b, // BID
        protected readonly Trade                      $c, // Last trade closed
        protected readonly Volume                     $v, // Volume
        protected readonly VolumeWeightedAveragePrice $p, // Volume weighted average price
        protected readonly NumbersOfTrade             $t, // Number of trades
        protected readonly Low                        $l, // Low
        protected readonly High                       $h, // High
        protected readonly string                     $o, // Today's opening price
        protected readonly string                     $pair,
    )
    {
        $this->pairNormalized = PairNormalizer::normalize($this->pair);
    }

    /**
     * @return Ask
     */
    public function getA(): Ask
    {
        return $this->a;
    }

    /**
     * @return Bid
     */
    public function getB(): Bid
    {
        return $this->b;
    }

    /**
     * @return Trade
     */
    public function getC(): Trade
    {
        return $this->c;
    }

    /**
     * @return Volume
     */
    public function getV(): Volume
    {
        return $this->v;
    }

    /**
     * @return VolumeWeightedAveragePrice
     */
    public function getP(): VolumeWeightedAveragePrice
    {
        return $this->p;
    }

    /**
     * @return NumbersOfTrade
     */
    public function getT(): NumbersOfTrade
    {
        return $this->t;
    }

    /**
     * @return Low
     */
    public function getL(): Low
    {
        return $this->l;
    }

    /**
     * @return High
     */
    public function getH(): High
    {
        return $this->h;
    }

    /**
     * @return string
     */
    public function getO(): string
    {
        return $this->o;
    }

    /**
     * @return string
     */
    public function getPair(): string
    {
        return $this->pair;
    }

    /**
     * @return string
     */
    public function getPairNormalized(): string
    {
        return $this->pairNormalized;
    }
}