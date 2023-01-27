<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Provider\User\Balance\Trade;

use Jaddek\Kraken\Http\Client\RequestBody as BaseRequestBody;

class RequestBody extends BaseRequestBody
{
    public function __construct(
        /**
         * Default: "ZUSD"
         * Base asset used to determine balance
         */
        protected readonly string $asset = 'ZUSD',
    )
    {
    }

    /**
     * @return string
     */
    public function getAsset(): string
    {
        return $this->asset;
    }
}