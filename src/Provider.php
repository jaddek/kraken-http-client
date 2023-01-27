<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

use Jaddek\Kraken\Http\Client\Client\KrakenErrors;
use Jaddek\Kraken\Http\Client\Client\KrakenHttpException;
use Jaddek\Kraken\Http\Client\Contract\KrakenHttpClientInterface;

abstract class Provider
{
    final protected function __construct(
        protected readonly KrakenHttpClientInterface $client,
        protected ?\Closure $errorCallback = null,
    )
    {
        $this->attachDefaultErrorCallback();
    }

    public static function getInstance(KrakenHttpClientInterface $client): static
    {
        return new static($client);
    }

    public function attachErrorCallback(\Closure $closure): void
    {
        $this->errorCallback = $closure;
    }

    public function attachDefaultErrorCallback(): void
    {
        $this->errorCallback = function (array $errors): void {
            $error = current($errors);

            throw new KrakenHttpException($error, KrakenErrors::getErrorDescription($error));
        };
    }

    public function detachErrorCallback(): void
    {
        $this->errorCallback = null;
    }

    protected function runErrorCallback(array $errors): void
    {
        if ($this->errorCallback === null) {
            return;
        }

        call_user_func($this->errorCallback, $errors);
    }
}