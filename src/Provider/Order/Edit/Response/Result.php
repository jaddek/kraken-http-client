<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Edit\Response;

use Jaddek\Kraken\Http\Client\Hydrator\Item;
use Jaddek\Kraken\Http\Client\Provider\Order\Edit\Request\Description;

class Result extends Item
{
    public function __construct(
        /**
         * string
         * Order description info
         */
        private readonly Description $descr,

        /**
         * string
         * Original userref if passed with the request
         */
        private readonly string $newuserref,

        /**
         * string
         * Original userref if passed with the request
         */
        private readonly string $olduserref,

        /**
         * int
         * Number of orders cancelled (either 0 or 1)
         */
        private readonly int $orders_cancelled,

        /**
         * string
         * Original transaction ID
         */
        private readonly string $originaltxid,

        /**
         * string
         * Status of the order: Ok or Err
         */
        private readonly string $status,

        /**
         * string
         * Updated volume
         */
        private readonly string $volume,

        /**
         * string
         * Updated price
         */
        private readonly string $price,

        /**
         * string
         * Updated price2
         */
        private readonly string $price2,

        /**
         * string
         * New Transaction ID
         *
         * (if order was added successfully)
         */
        private ?string $txid,

        /**
         * string
         * Error message if unsuccessful
         */
        private ?string $error_message = null,

    )
    {

    }

    /**
     * @return Description
     */
    public function getDescr(): Description
    {
        return $this->descr;
    }

    /**
     * @return string
     */
    public function getNewuserref(): string
    {
        return $this->newuserref;
    }

    /**
     * @return string
     */
    public function getOlduserref(): string
    {
        return $this->olduserref;
    }

    /**
     * @return int
     */
    public function getOrdersCancelled(): int
    {
        return $this->orders_cancelled;
    }

    /**
     * @return string
     */
    public function getOriginaltxid(): string
    {
        return $this->originaltxid;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
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

    /**
     * @return string|null
     */
    public function getTxid(): ?string
    {
        return $this->txid;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->error_message;
    }
}
