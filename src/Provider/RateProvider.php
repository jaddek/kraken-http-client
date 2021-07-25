<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider;

use Jaddek\Kraken\Http\Client\AbstractProvider;
use Jaddek\Kraken\Http\Client\Response\Rate;

class RateProvider extends AbstractProvider
{
    public function rate(string $from, string $to): Rate
    {
        $query = [
            'pair' => sprintf('%s%s', $from, $to)
        ];

        $response = $this->client->rate($query);
        $data     = $response->toArray()['result'] ?? [];

        return new Rate($data);
    }
}
