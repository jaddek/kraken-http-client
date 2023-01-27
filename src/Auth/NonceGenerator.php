<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Auth;

class NonceGenerator
{
    public static function gen(): string
    {
        $nonce = explode(' ', microtime());
        return $nonce[1] . str_pad(substr($nonce[0], 2, 6), 6, '0');
//        return (string)(microtime(true) * 10000);
    }
}
