<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\Ticker;

use Jaddek\Hydrator\Hydrator;
use Jaddek\Hydrator\HydratorException;
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
     * @throws HydratorException
     */
    public function __invoke(RequestQuery $query): Response
    {
        $content = $this->client
            ->getTickerInformation($query->toQuery())
            ->toArray()
        ;

        $this->adaptContent($content);

        /** @var Response $response */
        $response = Hydrator::instance($content, Response::class);

        if ($errors = $response->getError()) {
            $this->runErrorCallback($errors);
        }

        return $response;
    }

    /**
     * @param array<string, mixed> $data
     * @return void
     */
    private function adaptContent(array &$data): void
    {
        $synced = [];
        foreach ($data['result'] ?? [] as $pair => $body) {
            $synced[] = KeySync::sync($body, $pair);
        }

        $data['result'] = $synced;
    }
}

