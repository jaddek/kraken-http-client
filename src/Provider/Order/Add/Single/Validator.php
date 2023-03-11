<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Single;

use Jaddek\Kraken\Http\Client\Crypto;
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

        $pattern     = sprintf('/(%s)$/', implode('|', $cases));
        $allegedCoin = preg_replace($pattern, '', $body->getPair());

        $coin = Crypto::tryFrom($allegedCoin);

        if (!$coin instanceof Crypto) {
            $message = sprintf('Undefined currency %s.', $allegedCoin);
            throw new KrakenValidationException($message, 100);
        }

        $limit = MinTradeLimits::getTradeLimit($coin->value);

        if ($limit === null) {
            $message = sprintf('Min operation volume not defined for currency %s.', $coin->value);
            throw new KrakenValidationException($message, 101);
        }

        $volume = $body->getOrder()->getVolume();

        if ($volume < $limit) {
            $message = sprintf('Min operation volume is %s got %s for currency %s.', $limit, $volume, $coin->value);
            throw new KrakenValidationException($message, 102);
        }
    }
}