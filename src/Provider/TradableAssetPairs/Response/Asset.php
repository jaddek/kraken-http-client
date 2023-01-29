<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\TradableAssetPairs\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Item;

class Asset extends Item
{
    public function __construct(
        /**
         * Alternate pair name
         */
        private readonly ?string $altname,

        /**
         * WebSocket pair name (if available)
         */
        private readonly ?string $wsname,

        /**
         * Asset class of base component
         */
        private readonly ?string $aclass_base,

        /**
         * Asset ID of base component
         */
        private readonly ?string $base,

        /**
         * Asset class of quote component
         */
        private readonly ?string $aclass_quote,

        /**
         * Asset ID of quote component
         */
        private readonly ?string $quote,

        /**
         * Scaling decimal places for pair
         */
        private readonly ?int $cost_decimals,

        /**
         * Scaling decimal places for cost
         */
        private readonly ?int $pair_decimals,

        /**
         * Scaling decimal places for volume
         */
        private readonly ?int $lot_decimals,

        /**
         * Amount to multiply lot volume by to get currency volume
         */
        private readonly ?int $lot_multiplier,

        /**
         * Array of leverage amounts available when buying
         *
         * @var array<int>|null
         */
        private readonly ?array $leverage_buy,

        /**
         * Array of leverage amounts available when selling
         *
         * @var array<int>|null
         */
        private readonly ?array $leverage_sell,

        /**
         * Fee schedule array in [<volume>, <percent fee>] tuples
         *
         * @var array<array<int>>|null
         */
        private readonly ?array $fees,

        /**
         * Maker fee schedule array in [<volume>, <percent fee>] tuples (if on maker/taker)
         *
         * @var array<array<int>>|null
         */
        private readonly ?array $fees_maker,

        /**
         * Volume discount currency
         */
        private readonly ?string $fee_volume_currency,

        /**
         * Margin call level
         */
        private readonly ?int $margin_call,

        /**
         * Stop-out/liquidation margin level
         */
        private readonly ?int $margin_stop,

        /**
         * Minimum order size (in terms of base currency)
         */
        private readonly ?string $ordermin,

        /**
         * Minimum order cost (in terms of quote currency)
         */
        private readonly ?string $costmin,

        /**
         * Minimum increment between valid price levels
         */
        private readonly ?string $tick_size,

        /**
         * Status of asset. Possible values: online, cancel_only, post_only, limit_only, reduce_only.
         */
        private readonly ?string $status,
    )
    {
    }

    public function getAltname(): ?string
    {
        return $this->altname;
    }

    public function getWsname(): ?string
    {
        return $this->wsname;
    }

    public function getAclassBase(): ?string
    {
        return $this->aclass_base;
    }

    public function getBase(): ?string
    {
        return $this->base;
    }

    public function getAclassQuote(): ?string
    {
        return $this->aclass_quote;
    }

    public function getQuote(): ?string
    {
        return $this->quote;
    }

    public function getCostDecimals(): ?int
    {
        return $this->cost_decimals;
    }

    public function getPairDecimals(): ?int
    {
        return $this->pair_decimals;
    }

    public function getLotDecimals(): ?int
    {
        return $this->lot_decimals;
    }

    public function getLotMultiplier(): ?int
    {
        return $this->lot_multiplier;
    }

    public function getLeverageBuy(): ?array
    {
        return $this->leverage_buy;
    }

    public function getLeverageSell(): ?array
    {
        return $this->leverage_sell;
    }

    public function getFees(): ?array
    {
        return $this->fees;
    }

    public function getFeesMaker(): ?array
    {
        return $this->fees_maker;
    }

    public function getFeeVolumeCurrency(): ?string
    {
        return $this->fee_volume_currency;
    }

    public function getMarginCall(): ?int
    {
        return $this->margin_call;
    }

    public function getMarginStop(): ?int
    {
        return $this->margin_stop;
    }

    public function getOrdermin(): ?string
    {
        return $this->ordermin;
    }

    public function getCostmin(): ?string
    {
        return $this->costmin;
    }

    public function getTickSize(): ?string
    {
        return $this->tick_size;
    }
    
    public function getStatus(): ?string
    {
        return $this->status;
    }
}
