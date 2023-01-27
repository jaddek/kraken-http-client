<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker;

class KeySync
{
    private const KEY_MAP = [
        'a' => [
            0 => 'price',
            1 => 'wholeLotVolume',
            2 => 'lotVolume',
        ],
        'b' => [
            0 => 'price',
            1 => 'wholeLotVolume',
            2 => 'lotVolume',
        ],
        'c' => [
            0 => 'price',
            1 => 'lotVolumes',
        ],
        'v' => [
            0 => 'today',
            1 => 'last24Hours',
        ],
        'p' => [
            0 => 'today',
            1 => 'last24Hours',
        ],
        't' => [
            0 => 'today',
            1 => 'last24Hours',
        ],
        'l' => [
            0 => 'today',
            1 => 'last24Hours',
        ],
        'h' => [
            0 => 'today',
            1 => 'last24Hours',
        ],
        'o' => null
    ];

    /**
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    public static function sync(array $data, string $pair): array
    {
        $synced = [
            'pair' => $pair,
        ];

        foreach (self::KEY_MAP as $key => $values) {

            if ($values === null) {
                $synced[$key] = $data[$key];
                continue;
            }

            foreach ($values as $index => $field) {
                $synced[$key][$field] = $data[$key][$index];
            }
        }

        return $synced;
    }
}