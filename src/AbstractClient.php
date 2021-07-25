<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractClient
{
    public function __construct(protected HttpClientInterface $httpClient)
    {
    }
}