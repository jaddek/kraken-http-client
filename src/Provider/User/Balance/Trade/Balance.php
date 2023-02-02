<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\User\Balance\Trade;


use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Balance extends Item
{
    public function __construct(
        /** Equivalent balance (combined balance of all currencies) */
        protected readonly ?string $eb,
        /** Trade balance (combined balance of all equity currencies) */
        protected readonly ?string $tb,
        /** Margin amount of open positions */
        protected readonly ?string $m,
        /** Unrealized net profit/loss of open positions */
        protected readonly ?string $n,
        /** Cost basis of open positions */
        protected readonly ?string $c,
        /** Current floating valuation of open positions */
        protected readonly ?string $v,
        /** Equity: trade balance + unrealized net profit/loss */
        protected readonly ?string $e,
        /** Free margin: Equity - initial margin (maximum margin available to open new positions) */
        protected readonly ?string $mf,
        /** Margin level: (equity / initial margin) * 100 */
        protected readonly ?string $ml,
        /** Unexecuted value: Value of unfilled and partially filled orders */
        protected readonly ?string $uv,
    )
    {}

    /**
     * @return string|null
     */
    public function getEb(): ?string
    {
        return $this->eb;
    }

    /**
     * @return string|null
     */
    public function getTb(): ?string
    {
        return $this->tb;
    }

    /**
     * @return string|null
     */
    public function getM(): ?string
    {
        return $this->m;
    }

    /**
     * @return string|null
     */
    public function getN(): ?string
    {
        return $this->n;
    }

    /**
     * @return string|null
     */
    public function getC(): ?string
    {
        return $this->c;
    }

    /**
     * @return string|null
     */
    public function getV(): ?string
    {
        return $this->v;
    }

    /**
     * @return string|null
     */
    public function getE(): ?string
    {
        return $this->e;
    }

    /**
     * @return string|null
     */
    public function getMf(): ?string
    {
        return $this->mf;
    }

    /**
     * @return string|null
     */
    public function getMl(): ?string
    {
        return $this->ml;
    }

    /**
     * @return string|null
     */
    public function getUv(): ?string
    {
        return $this->uv;
    }
}