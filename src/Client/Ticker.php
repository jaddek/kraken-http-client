<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

use App\Kraken\Http\Client\Client\TickerInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Ticker extends AbstractClient implements TickerInterface
{
    public function rate(array $query): ResponseInterface
    {
        return $this->httpClient->request('GET', '/0/public/Ticker', [
            'query' => $query
        ]);

    }
}
