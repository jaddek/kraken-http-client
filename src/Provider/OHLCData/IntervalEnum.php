<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\OHLCData;

enum IntervalEnum: int
{
    case MINUTE = 1;
    case MINUTES_5 = 5;

    case MINUTES_15 = 15;

    case MINUTES_30 = 30;
    case HOUR = 60;

    case HOUR_4 = 240;

    case DAY = 1440;

    case DAYS_15 = 10080;
}