<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Auth;

trait NonceTrait
{
    /**
     * integer <int32> (nonce)
     * NonceGenerator used in construction of API-Sign header
     */
    private ?string $nonce = null;

    public function getNonce(): ?string
    {
        return $this->nonce;
    }

    public function setNonce(string $nonce): void
    {
        $this->nonce = $nonce;
    }

    public function genNonce(): string
    {
        $nonce       = NonceGenerator::gen();
        $this->nonce = $nonce;

        return $nonce;
    }

    public function getNonceOfGenIfNull(): string
    {
        return $this->getNonce() ?? $this->genNonce();
    }
}