<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Batch;

use Jaddek\Hydrator\Hydrator;
use Jaddek\Kraken\Http\Client\Provider as BaseProvider;

class Provider extends BaseProvider
{
    public function __invoke(RequestBody $body): Response
    {
        $nonce = $body->getNonceOfGenIfNull();
        $content = $this->client
            ->orderAddBatch($nonce, $body->toArray())
            ->toArray()
        ;

        /** @var Response $response */
        $response = Hydrator::instance($content, Response::class);

        if ($errors = $response->getError()) {
            $this->runErrorCallback($errors);
        }

        return $response;
    }
}