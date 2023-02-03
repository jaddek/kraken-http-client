<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

class PairNormalizer
{
    /**
     * Kraken using ISO code for Bitcoin - XBT.
     * This func rewriting XBT to BTC as more familiar coin name
     */
    public static function rewrite(string $pair): string
    {
        return str_replace(Crypto::XBT->value, Crypto::BTC->value, $pair);
    }

    /**
     * For some pairs Kraken add X and Z at the beginning of coin.
     * Example XBTCZUSD
     *
     * As the default params to query were BTC, USD so normalize XXBT to BTC and ZUSD to USD
     */
    public static function normalize(string $pair): string
    {
        $pair = self::rewrite($pair);

        $fiat = array_map(function (\UnitEnum $unit) {
            return $unit->value;
        }, Fiat::cases());

        $crypto = array_map(function (\UnitEnum $unit) {
            return $unit->value;
        }, Crypto::cases());

        $currencies = implode('|', array_merge($fiat, $crypto));
        $pattern    = sprintf('/^[XZ]?(%s)[XZ]?(%s)$/', $currencies, $currencies);

        return preg_replace($pattern, '$1$2', $pair);
    }
}
