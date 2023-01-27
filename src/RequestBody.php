<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

use Jaddek\Kraken\Http\Client\Auth\NonceInterface;
use Jaddek\Kraken\Http\Client\Auth\NonceTrait;

abstract class RequestBody implements \JsonSerializable, NonceInterface, ArrayInterface
{
    use JsonTrait, NonceTrait, ArrayTrait;
}