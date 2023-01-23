<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Client;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface KrakenHttpClientInterface
{
    public function ticker(array $query): ResponseInterface;
}