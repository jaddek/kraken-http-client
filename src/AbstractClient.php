<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractClient
{
    protected HttpClientInterface $httpClient;

    public function __construct()
    {
        $this->httpClient = HttpClient::create()->withOptions(
            [
                'base_uri' => 'https://api.kraken.com/'
            ]
        )
        ;
    }
}