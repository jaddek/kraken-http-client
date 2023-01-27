<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider;

use Jaddek\Kraken\Http\Client\Client\KrakenHttpClientInterface;

class Singleton
{
    protected static array $instances = [];

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    /**
     * @throws \Exception
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot wakeup a singleton.");
    }

    public static function getInstance(KrakenHttpClientInterface $client): static
    {
        $class = static::class;
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static($client);
        }

        return self::$instances[$class];
    }
}