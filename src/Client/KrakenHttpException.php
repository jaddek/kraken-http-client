<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Client;

use Jaddek\Kraken\Http\Client\KrakenException as BaseKrakenException;

class KrakenHttpException extends BaseKrakenException
{
    public function __construct(
        private readonly string $keyword,
        string                  $message = "",
        int                     $code = 0,
        ?\Throwable             $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
    }

    public function getKeyword(): string
    {
        return $this->keyword;
    }
}