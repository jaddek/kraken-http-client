<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Batch\Request;

use Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOrderTrigger;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOrderType;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumTimeInforce;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumTradePreventionBehaviors;

class Order implements \JsonSerializable
{
    public function __construct(
        /**
         * Order type
         * @see EnumOrderType
         */
        private readonly EnumOrderType                 $ordertype,

        /**
         * string
         * Order quantity in terms of the base asset
         *
         * Note: Volume can be specified as 0 for closing margin orders to automatically fill the requisite quantity.
         */
        private readonly string                        $volume,

        /**
         * string (oflags)
         * Comma delimited list of order flags @see EnumOrderFlags
         */
        private readonly string                        $oflags,

        /**
         * string
         * Scheduled start time, can be specified as an absolute timestamp or as a number of seconds in the future:
         *
         * 0 now (default)
         * +<n> schedule start time seconds from now
         * <n> = unix timestamp of start time
         */
        private readonly string                        $starttm,

        /**
         * string
         * Expiration time
         *
         * 0 no expiration (default)
         * +<n> = expire seconds from now, minimum 5 seconds
         * <n> = unix timestamp of expiration time
         */
        private readonly string                        $expiretm,

        /**
         * close[ordertype] - Conditional close order type
         * close[price] - Conditional close order
         * close[price2] - Conditional close order
         */
        private readonly ?Close                        $close = null,

        /**
         * string
         *
         * Order quantity in terms of the base asset.
         * This is used to create an iceberg order, with display_volume as visible quantity, hiding rest of the order.
         * This can only be used with limit order type.
         */
        private readonly ?string                       $displayvol = null,

        /**
         * string
         * Price
         *
         * Limit price for limit orders
         * Trigger price for stop-loss, stop-loss-limit, take-profit and take-profit-limit orders
         */
        private readonly ?string                       $price = null,

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
        private readonly ?string                       $price2 = null,

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
        private readonly ?int                          $userref = null,

        /**
         * Amount of leverage desired (default: none)
         */
        private readonly ?string                       $leverage = null,

        /**
         * If true, order will only reduce a currently open position, not increase it or open a new position.
         */
        private readonly ?bool                          $reduce_only = null,

        /**
         * Default: "last"
         *
         * Price signal used to trigger stop-loss, stop-loss-limit,
         * take-profit and take-profit-limit orders (@see EnumOrderType)
         *
         * This trigger type will as well be used for associated conditional close orders.
         */
        private readonly ?EnumOrderTrigger             $trigger = null,

        /**
         * Default: "cancel-newest"
         *
         * Self trade prevention behavior definition.
         */
        private readonly ?EnumTradePreventionBehaviors $stptype = null,

        /**
         * Default: "GTC"
         *
         * Time-in-force of the order to specify how long it should remain in the order book before being cancelled.
         */
        private readonly ?EnumTimeInforce              $timeinforce = null,
    )
    {
    }

    /**
     * @return EnumOrderType
     */
    public function getOrdertype(): EnumOrderType
    {
        return $this->ordertype;
    }

    /**
     * @return string
     */
    public function getVolume(): string
    {
        return $this->volume;
    }

    /**
     * @return string
     */
    public function getOflags(): string
    {
        return $this->oflags;
    }

    /**
     * @return string
     */
    public function getStarttm(): string
    {
        return $this->starttm;
    }

    /**
     * @return string
     */
    public function getExpiretm(): string
    {
        return $this->expiretm;
    }

    /**
     * @return Close|null
     */
    public function getClose(): ?Close
    {
        return $this->close;
    }

    /**
     * @return string|null
     */
    public function getDisplayvol(): ?string
    {
        return $this->displayvol;
    }

    /**
     * @return string|null
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * @return string|null
     */
    public function getPrice2(): ?string
    {
        return $this->price2;
    }

    /**
     * @return int|null
     */
    public function getUserref(): ?int
    {
        return $this->userref;
    }

    /**
     * @return string|null
     */
    public function getLeverage(): ?string
    {
        return $this->leverage;
    }

    /**
     * @return bool|null
     */
    public function isReduceOnly(): ?bool
    {
        return $this->reduce_only;
    }

    /**
     * @return null|EnumOrderTrigger
     */
    public function getTrigger(): ?EnumOrderTrigger
    {
        return $this->trigger;
    }

    /**
     * @return null|EnumTradePreventionBehaviors
     */
    public function getStptype(): ?EnumTradePreventionBehaviors
    {
        return $this->stptype;
    }

    /**
     * @return null|EnumTimeInforce
     */
    public function getTimeinforce(): ?EnumTimeInforce
    {
        return $this->timeinforce;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}