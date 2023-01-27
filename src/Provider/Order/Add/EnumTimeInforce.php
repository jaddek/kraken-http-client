<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add;

enum EnumTimeInforce: string
{
    /**
     * GTC (Good-'til-cancelled) is default if the parameter is omitted.
     */
    case GTC = 'GTC';
    /**
     * IOC (immediate-or-cancel) will immediately execute the amount possible and cancel any remaining balance rather than resting in the book.
     */
    case IOC = 'IOC';
    /**
     * GTD (good-'til-date), if specified, must coincide with a desired expiretm.
     */
    case GTD = 'GTD';
}