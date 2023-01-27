<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Auth;

interface SignerInterface
{
    public function getSign(
        string $urlPath,
        string $nonce,
        string $body,
    ): string;

    public function getKey(): string;

    public function getSignHeaders(
        string $urlPath,
        string $nonce,
        string $body,
    ): array;

    public function isConfigured(): bool;
}