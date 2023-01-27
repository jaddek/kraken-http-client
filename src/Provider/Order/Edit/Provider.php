<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Edit;

use Jaddek\Hydrator\Hydrator;
use Jaddek\Kraken\Http\Client\Provider as BaseProvider;

class Provider extends BaseProvider
{
    public function __invoke(RequestBody $body): Response
    {
        $content = $this->client
            ->orderEdit($body->jsonSerialize())
            ->toArray()
        ;

        $response = Hydrator::instance($content, Response::class);

        \assert($response instanceof Response);

        return $response;
    }
}