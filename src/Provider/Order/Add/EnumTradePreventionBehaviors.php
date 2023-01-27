<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add;

enum EnumTradePreventionBehaviors: string
{
    /**
     * cancel-newest - if self trade is triggered, arriving order will be canceled
     */
    case CANCEL_NEWEST = 'cancel-newest';

    /**
     * cancel-oldest - if self trade is triggered, resting order will be canceled
     */
    case CANCEL_OLDEST = 'cancel-oldest';

    /**
     * cancel-both - if self trade is triggered, both arriving and resting orders will be canceled
     */
    case CANCEL_BOTH = 'cancel-both';
}