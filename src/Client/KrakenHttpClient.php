<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Client;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class KrakenHttpClient implements KrakenHttpClientInterface
{
    private HttpClientInterface $httpClient;

    public function __construct()
    {
        $this->httpClient = HttpClient::create()->withOptions(
            [
                'base_uri' => 'https://api.kraken.com/'
            ]
        );
    }

    public function ticker(array $query): ResponseInterface
    {
        return $this->httpClient->request('GET', '/0/public/Ticker', [
            'query' => $query
        ]);

    }
}
