<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\AssetInfo\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Asset extends Item
{
    public function __construct(
        private readonly string $aclass,
        private readonly string $altname,
        private readonly ?int $decimals,
        private readonly ?int $display_decimals,
        private readonly ?int $collateral_value,
        private readonly string $status,
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