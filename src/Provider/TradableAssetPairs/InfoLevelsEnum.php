<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\TradableAssetPairs;

enum InfoLevelsEnum: string
{
    case INFO = 'info';
    case LEVERAGE = 'leverage';
    case FEES = 'fees';
    case MARGIN = 'margin';
}