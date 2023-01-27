<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Auth;

class Signer implements SignerInterface
{
    public function __construct(
        private readonly string $key,
        private readonly string $secret,
    )
    {
    }

    public function getSign(
        string $urlPath,
        string $nonce,
        string $body,
    ): string
    {

        $message = $urlPath . hash('sha256', $nonce . $body, true);
        $sign    = hash_hmac('sha512', $message, base64_decode($this->secret), true);

        return base64_encode($sign);
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getSignHeaders(
        string $urlPath,
        string $nonce,
        string $body,
    ): array
    {
        return [
            'Content-Type'    => 'application/x-www-form-urlencoded',
            'User-Agent'      => 'Kraken PHP API Agent',
            'API-Key'         => $this->getKey(),
            'API-Sign'        => $this->getSign($urlPath, $nonce, $body),
        ];
    }

    public function isConfigured(): bool
    {
        return (empty($this->key) && empty($this->secret)) === false;
    }
}
