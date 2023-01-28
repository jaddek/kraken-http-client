<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Pair extends Item
{

    public function __construct(
        private Ask                        $a, // ASK
        private Bid                        $b, // BID
        private Trade                      $c, // Last trade closed
        private Volume                     $v, // Volume
        private VolumeWeightedAveragePrice $p, // Volume weighted average price
        private NumbersOfTrade             $t, // Number of trades
        private Low                        $l, // Low
        private High                       $h, // High
        private string                     $o, // Today's opening price
        private string                     $pair,
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