<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Websocket;

use Jaddek\Kraken\Http\Client\Hydrator\Hydrator;
use Jaddek\Kraken\Http\Client\Hydrator\HydratorException;
use Jaddek\Kraken\Http\Client\Provider as BaseProvider;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class Provider extends BaseProvider
{
    /**
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     * @throws TransportExceptionInterface
     * @throws HydratorException|\ReflectionException
     */
    public function __invoke(): Response
    {
        $body     = new RequestBody();
        $nonce    = $body->getNonceOfGenIfNull();
        $content = $this->client->getWebSocketToken(
            $nonce,
            $body->toArray(),
        )->toArray();

        /** @var Response $response */
        $response = Hydrator::instance($content, Response::class);

        if ($errors = $response->getError()) {
            $this->runErrorCallback($errors);
        }

        return $response;
    }
}

