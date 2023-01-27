<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Response;

use Jaddek\Hydrator\Item;

class Result extends Item
{
    public function __construct(
        private readonly Description $descr,
        private readonly ?array      $txid = [],
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
     * @return array
     */
    public function getTxid(): array
    {
        return $this->txid;
    }
}
