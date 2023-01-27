<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Auth;

interface NonceInterface
{
    public function getNonce(): ?string;

    public function setNonce(string $nonce): void;

    public function genNonce(): string;

    public function getNonceOfGenIfNull(): string;
}