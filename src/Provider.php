<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

use Jaddek\Kraken\Http\Client\Client\KrakenErrors;
use Jaddek\Kraken\Http\Client\Client\KrakenHttpException;
use Jaddek\Kraken\Http\Client\Client\KrakenHttpClientInterface;
use Jaddek\Kraken\Http\Client\Provider\Singleton;

abstract class Provider extends Singleton
{
    protected function __construct(
        protected readonly KrakenHttpClientInterface $client,
    )
    {
        $this->attachDefaultErrorCallback();
        parent::__construct();
    }

    protected ?\Closure $errorCallback = null;

    public function attachErrorCallback(\Closure $closure)
    {
        $this->errorCallback = $closure;
    }

    public function attachDefaultErrorCallback(): void
    {
        $this->errorCallback = function (array $errors) {
            $error = current($errors);

            throw new KrakenHttpException($error, KrakenErrors::getErrorDescription($error));
        };
    }

    public function detachErrorCallback()
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