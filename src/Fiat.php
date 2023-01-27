<?php

namespace Jaddek\Kraken\Http\Client;

/**
 * Source https://support.kraken.com/hc/en-us/articles/201893658
 */
enum Fiat: string
{
    case USD = 'USD';
    case EUR = 'EUR';
    case CAD = 'CAD';
    case JPY = 'JPY';
    case GBP = 'GBP';
    case CHF = 'CHF';
    case AUD = 'AUD';
}