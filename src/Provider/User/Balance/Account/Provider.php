<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\User\Balance\Account;

use Jaddek\Kraken\Http\Client\Provider as BaseProvider;

class Provider extends BaseProvider
{
    public function __invoke(): array
    {
        $body     = new RequestBody();
        $nonce    = $body->getNonceOfGenIfNull();
        $response = $this->client->getAccountBalance(
            $nonce,
            $body->toArray(),
        )->toArray();

        if ($response['error']) {
            $this->runErrorCallback($response['error']);
        }

        return $response;
    }
}