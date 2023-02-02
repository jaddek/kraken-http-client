<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Edit;

use Jaddek\Kraken\Http\Client\Hydrator\Hydrator;
use Jaddek\Kraken\Http\Client\Provider as BaseProvider;

class Provider extends BaseProvider
{
    public function __invoke(RequestBody $body): Response
    {
        Validator::run($body);

        $nonce    = $body->getNonceOfGenIfNull();
        $response = $this->client->orderAdd($nonce, $body->toArrayWithSubOrder());
        $content  = $response->toArray();

        $response = Hydrator::instance($content, Response::class);

        \assert($response instanceof Response);

        return $response;
    }
}