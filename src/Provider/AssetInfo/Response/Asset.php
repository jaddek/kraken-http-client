<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\AssetInfo\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Asset extends Item
{
    public function __construct(
        protected readonly string $aclass,
        protected readonly string $altname,
        protected readonly ?int $decimals,
        protected readonly ?int $display_decimals,
        protected readonly ?int $collateral_value,
        protected readonly string $status,
    )
    {
    }

    /**
     * @return string
     */
    public function getAclass(): string
    {
        return $this->aclass;
    }

    /**
     * @return string
     */
    public function getAltname(): string
    {
        return $this->altname;
    }

    /**
     * @return int|null
     */
    public function getDecimals(): ?int
    {
        return $this->decimals;
    }

    /**
     * @return int|null
     */
    public function getDisplayDecimals(): ?int
    {
        return $this->display_decimals;
    }

    /**
     * @return int|null
     */
    public function getCollateralValue(): ?int
    {
        return $this->collateral_value;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}