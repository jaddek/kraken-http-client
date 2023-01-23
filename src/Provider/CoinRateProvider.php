<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider;

use Jaddek\Kraken\Http\Client\Client\KrakenHttpClientInterface;
use Jaddek\Kraken\Http\Client\Response\Rate;
use Psr\Log\LoggerInterface;

class CoinRateProvider
{
    public function __construct(
        private KrakenHttpClientInterface $client,
    )
    {
    }

    public function __invoke(string $from, string $to): Rate
    {
        $query = [
            'pair' => sprintf('%s%s', $from, $to)
        ];

        $response = $this->client->ticker($query);
        $data     = $response->toArray()['result'] ?? [];

        return new Rate($data);
    }
}
