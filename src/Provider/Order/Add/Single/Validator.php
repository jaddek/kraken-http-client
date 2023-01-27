<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Single;

use Jaddek\Kraken\Http\Client\Fiat;
use Jaddek\Kraken\Http\Client\KrakenValidationException;
use Jaddek\Kraken\Http\Client\MinTradeLimits;

class Validator
{
    public static function run(RequestBody $body): void
    {
        $cases = array_map(function (\UnitEnum $fiat) {
            return $fiat->value;
        }, Fiat::cases());

        $pattern = sprintf('/%s$/', implode('|', $cases));
        $coin    = preg_replace($pattern, '', $body->getPair());

        $limit  = MinTradeLimits::getTradeLimit($coin);
        $volume = $body->getOrder()->getVolume();

        if ($volume < $limit) {
            $message = sprintf('Min operation volume is %s got %s for currency %s.', $limit, $volume, $coin);
            throw new KrakenValidationException($message);
        }
    }
}