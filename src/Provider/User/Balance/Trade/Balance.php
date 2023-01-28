<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\User\Balance\Trade;


use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Balance extends Item
{
    public function __construct(
        /** Equivalent balance (combined balance of all currencies) */
        private readonly ?string $eb,
        /** Trade balance (combined balance of all equity currencies) */
        private readonly ?string $tb,
        /** Margin amount of open positions */
        private readonly ?string $m,
        /** Unrealized net profit/loss of open positions */
        private readonly ?string $n,
        /** Cost basis of open positions */
        private readonly ?string $c,
        /** Current floating valuation of open positions */
        private readonly ?string $v,
        /** Equity: trade balance + unrealized net profit/loss */
        private readonly ?string $e,
        /** Free margin: Equity - initial margin (maximum margin available to open new positions) */
        private readonly ?string $mf,
        /** Margin level: (equity / initial margin) * 100 */
        private readonly ?string $ml,
        /** Unexecuted value: Value of unfilled and partially filled orders */
        private readonly ?string $uv,
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