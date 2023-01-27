<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Order\Add\Single;

use Jaddek\Hydrator\Hydrator;
use Jaddek\Hydrator\HydratorException;
use Jaddek\Kraken\Http\Client\KrakenValidationException;
use Jaddek\Kraken\Http\Client\Provider as BaseProvider;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class Provider extends BaseProvider
{
    /**
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws KrakenValidationException
     * @throws ClientExceptionInterface
     * @throws HydratorException
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     */
    public function __invoke(RequestBody $body): Response
    {
        Validator::run($body);

        $nonce    = $body->getNonceOfGenIfNull();
        $response = $this->client->orderAdd($nonce, $body->toArrayWithSubOrder());

        $content  = $response->toArray();

        /** @var Response $response */
        $response = Hydrator::instance($content, Response::class);

        if ($errors = $response->getError()) {
            $this->runErrorCallback($errors);
        }

        return $response;
    }
}