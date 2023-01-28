<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\User\Balance\Trade;

use Jaddek\Kraken\Http\Client\Hydrator\Hydrator;
use Jaddek\Kraken\Http\Client\Provider as BaseProvider;

class Provider extends BaseProvider
{
    public function __invoke(): Response
    {
        $body  = new RequestBody();
        $nonce = $body->getNonceOfGenIfNull();

        $response = $this->client->getTradeBalance($nonce, $body->toArray());
        $content  = $response->toArray();

        /** @var Response $response */
        $response = Hydrator::instance($content, Response::class);

        if ($errors = $response->getError()) {
            $this->runErrorCallback($errors);
        }

        return $response;
    }
}