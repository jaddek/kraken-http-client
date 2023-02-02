<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Pair extends Item
{

    public function __construct(
        protected Ask                        $a, // ASK
        protected Bid                        $b, // BID
        protected Trade                      $c, // Last trade closed
        protected Volume                     $v, // Volume
        protected VolumeWeightedAveragePrice $p, // Volume weighted average price
        protected NumbersOfTrade             $t, // Number of trades
        protected Low                        $l, // Low
        protected High                       $h, // High
        protected string                     $o, // Today's opening price
        protected string                     $pair,
    )
    {

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
}