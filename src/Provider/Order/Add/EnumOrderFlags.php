<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add;

enum EnumOrderFlags: string
{
    /**
     *  post-only order (available when ordertype = limit)
     */
    case POST = 'post';
    /**
     * prefer fee in base currency (default if selling)
     */
    case FCIB = 'fcib';
    /**
     * prefer fee in quote currency (default if buying, mutually exclusive with fcib)
     */
    case FCIQ = 'fciq';
    /**
     * disable market price protection for market orders
     */
    case NOMPP = 'nompp';
    /**
     * order volume expressed in quote currency. This is supported only for market orders.
     */
    case VIQC = 'viqc';
}