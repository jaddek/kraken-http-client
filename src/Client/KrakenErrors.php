<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Client;
/**
 * https://docs.kraken.com/rest/#section/General-Usage/Requests-Responses-and-Errors
 */
class KrakenErrors
{
    const ERRORS = [
        'EGeneral:Invalid arguments'                   => 'The request payload is malformed, incorrect or ambiguous',
        'EGeneral:Invalid arguments:Index unavailable' => 'Index pricing is unavailable for stop/profit orders on this pair',
        'EService:Unavailable'                         => 'The matching engine or API is offline',
        'EService:Market in cancel_only mode'          => 'Request can\'t be made at this time (See SystemStatus endpoint)',
        'EService:Market in post_only mode'            => 'Request can\'t be made at this time (See SystemStatus endpoint)',
        'EService:Deadline elapsed'                    => 'The request timed out according to the default or specified deadline',
        // There is no information in documentation about this error
        'EAPI:Bad request'                             => 'Bad request',
        'EAPI:Invalid key'                             => 'An invalid API-Key header was supplied (see Authentication section)',
        'EAPI:Invalid signature'                       => 'An invalid API-Sign header was supplied (see Authentication section)',
        'EAPI:Invalid nonce'                           => 'An invalid nonce was supplied (see Authentication section)',
        'EGeneral:Permission denied'                   => 'API key doesn\'t have permission to make this request',
        'EOrder:Cannot open position'                  => 'Account/tier is ineligible for margin trading',
        'EOrder:Margin allowance exceeded'             => 'Account has exceeded their margin allowance',
        'EOrder:Margin level too low'                  => 'Client has insufficient equity or collateral',
        'EOrder:Margin position size exceeded'         => 'Client would exceed the maximum position size for this pair',
        'EOrder:Insufficient margin'                   => 'Exchange does not have available funds for this margin trade',
        'EOrder:Insufficient funds'                    => 'Client does not have the necessary funds',
        'EOrder:Order minimum not met'                 => 'Order size does not meet ordermin (See AssetPairs endpoint)',
        'EOrder:Cost minimum not met'                  => 'Cost (price * volume) does not meet costmin (See AssetPairs endpoint)',
        'EOrder:Tick size check failed'                => 'Price submitted is not a valid multiple of the pair\'s tick_size (See AssetPairs endpoint)',
        'EOrder:Orders limit exceeded'                 => '(See Rate Limits section)',
        'EOrder:Rate limit exceeded'                   => '(See Rate Limits section)',
        'EOrder:Domain rate limit exceeded'            => '(See Rate Limits section)',
        'EOrder:Positions limit exceeded'              => '',
        'EOrder:Unknown position'                      => '',
    ];

    public static function getErrorDescription(string $error): string
    {
        return self::ERRORS[$error] ?? $error;
    }
}