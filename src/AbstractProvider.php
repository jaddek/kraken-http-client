<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

use Psr\Log\LoggerInterface;

abstract class  AbstractProvider
{
    public function __construct(
        protected AbstractClient $client,
        protected LoggerInterface $logger
    )
    {
    }
}
