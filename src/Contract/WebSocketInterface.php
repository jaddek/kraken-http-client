<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Contract;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface WebSocketInterface
{
    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/Websockets-Authentication/operation/getWebsocketsToken
     */
    public function getWebSocketToken(string $nonce, array $body): ResponseInterface;
}
