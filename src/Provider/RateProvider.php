<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider;

use Jaddek\Kraken\Http\Client\Client\TickerInterface;
use Jaddek\Kraken\Http\Client\Response\Rate;
use Psr\Log\LoggerInterface;

class RateProvider
{
    public function __construct(TickerInterface $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    public function rate(string $from, string $to): Rate
    {
        $query = [
            'pair' => sprintf('%s%s', $from, $to)
        ];

        $response = $this->client->rate($query);

        dd($query, $response->toArray(false));
        $data     = $response->toArray()['result'] ?? [];

        return new Rate($data);
    }
}
