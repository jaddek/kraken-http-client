<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Cancel\After;

use Jaddek\Hydrator\Hydrator;
use Jaddek\Kraken\Http\Client\Client\KrakenHttpClientInterface;
use Jaddek\Kraken\Http\Client\Provider\Singleton;

class Provider extends Singleton
{
    protected function __construct(
        protected readonly KrakenHttpClientInterface $client,
    )
    {
        parent::__construct();
    }

    public function __invoke(RequestBody $body): Response
    {
        $content = $this->client
            ->orderCancelAfterX($body->jsonSerialize())
            ->toArray()
        ;

        $response = Hydrator::instance($content, Response::class);

        \assert($response instanceof Response);

        return $response;
    }
}