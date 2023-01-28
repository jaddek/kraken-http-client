<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Status;

/**
 * @see https://docs.kraken.com/rest/#tag/Market-Data/operation/getSystemStatus
 */
enum StatusEnum: string
{
    /**
     * Kraken is operating normally. All order types may be submitted and trades can occur.
     */
    case ONLINE = 'online';

    /**
     * The exchange is offline. No new orders or cancellations may be submitted.
     */
    case MAINTENANCE = 'maintenance';

    /**
     * Resting (open) orders can be cancelled but no new orders may be submitted. No trades will occur.
     */
    case CANCEL_ONLY = 'cancel_only';

    /**
     * Only post-only limit orders can be submitted. Existing orders may still be cancelled. No trades will occur.
     */
    case POST_ONLY = 'post_only';
}