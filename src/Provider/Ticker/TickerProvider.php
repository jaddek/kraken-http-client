<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker;

use Jaddek\Hydrator\Hydrator;
use Jaddek\Hydrator\HydratorException;
use Jaddek\Kraken\Http\Client\Client\KrakenHttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class TickerProvider
{
    public function __construct(
        private KrakenHttpClientInterface $client,
    )
    {
    }

    /**
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     * @throws HydratorException
     *
     * @throws TransportExceptionInterface
     */
    public function __invoke(array $pairs): Response
    {
        $pair = count($pairs) > 1 ? implode(',', $pairs) : $pairs;

        $body = $this->client->ticker(['pair' => $pair])->toArray();

        $this->adaptBody($body);

        $response = Hydrator::instance($body, Response::class);

        \assert($response instanceof Response);

        return $response;
    }

    private function adaptBody(array &$data): void
    {
        $synced = [];
        foreach ($data['result'] ?? [] as $pair => $body) {
            $synced[] = KeySync::sync($body, $pair);
        }

        $data['result'] = $synced;
        $data['error'] = [
            'error' => 1
        ];
    }
}

