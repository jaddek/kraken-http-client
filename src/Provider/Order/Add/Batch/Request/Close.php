<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Batch\Request;

use Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOrderType;

class Close implements \JsonSerializable
{
    public function __construct(
        /**
         * string
         * @see EnumOrderType
         *
         * Conditional close order type
         * Note: Conditional close orders are triggered by execution of the primary order in the same quantity and opposite direction, but once triggered are independent orders that may reduce or increase net position
         */
        private readonly EnumOrderType $orderType,
        /**
         * string
         *
         * Conditional close order price
         */
        private readonly string        $price,
        /**
         * string
         *
         * Conditional close order price2
         */
        private readonly string        $price2,
    )
    {
    }

    /**
     * @return EnumOrderType
     */
    public function getOrderType(): EnumOrderType
    {
        return $this->orderType;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getPrice2(): string
    {
        return $this->price2;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}