<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Edit\Request;

use Jaddek\Kraken\Http\Client\ArrayInterface;
use Jaddek\Kraken\Http\Client\ArrayTrait;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOrderFlags;

class Order implements ArrayInterface
{
    use ArrayTrait;

    public function __construct(
        /**
         * string or integer
         * Original Order ID or User Reference id (userref)
         * which is user-specified integer id used with the original order.
         *
         * If userref is not unique and was used with multiple order,
         * edit request is denied with an error.
         */
        private readonly int|string $txid,
        /**
         * string
         * Order quantity in terms of the base asset
         *
         * Note: Volume can be specified as 0 for closing margin orders to automatically fill the requisite quantity.
         */
        private readonly string     $volume,

        /**
         * string (oflags)
         * Comma delimited list of order flags @see EnumOrderFlags
         */
        private readonly ?string    $oflags = null,

        /**
         * string
         *
         * Order quantity in terms of the base asset.
         * This is used to create an iceberg order, with display_volume as visible quantity, hiding rest of the order.
         * This can only be used with limit order type.
         */
        private readonly ?string    $displayvol = null,

        /**
         * string
         * Price
         *
         * Limit price for limit orders
         * Trigger price for stop-loss, stop-loss-limit, take-profit and take-profit-limit orders
         */
        private readonly ?string    $price = null,

        /**
         * string
         * Secondary Price
         *
         * Limit price for stop-loss-limit and take-profit-limit orders
         *
         * Note: Either price or price2 can be preceded by +, -, or # to specify the order price
         * as an offset relative to the last traded price.
         * + adds the amount to, and - subtracts the amount from the last traded price.
         * # will either add or subtract the amount to the last traded price, depending on the direction and order
         * type used.
         *
         * Relative prices can be suffixed with a % to signify the relative amount as a percentage.
         */
        private readonly ?string    $price2 = null,

        /**
         * integer <int32>
         * Account reference id
         *
         * userref is an optional user-specified integer id that can be associated with any number of orders.
         * Many clients choose a userref corresponding to a unique integer id generated
         * by their systems (e.g. a timestamp). However, because we don't enforce uniqueness on our side,
         * it can also be used to easily group orders by pair, side, strategy, etc.
         * This allows clients to more readily cancel or query information about orders in a particular group,
         * with fewer API calls by using userref instead of our txid, where supported.
         */
        private readonly ?int       $userref = null,
    )
    {

    }

    public function getTxid(): int|string
    {
        return $this->txid;
    }

    public function getVolume(): string
    {
        return $this->volume;
    }

    public function getOflags(): ?string
    {
        return $this->oflags;
    }

    public function getDisplayvol(): ?string
    {
        return $this->displayvol;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function getPrice2(): ?string
    {
        return $this->price2;
    }

    public function getUserref(): ?int
    {
        return $this->userref;
    }

    public function jsonSerialize(): array
    {
        return array_filter(get_object_vars($this), fn($value) => null !== $value);
    }
}