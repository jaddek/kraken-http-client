<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Contract;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface UserSubAccountsInterface
{
    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Subaccounts/operation/createSubaccount
     */
    public function createSubAccount(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Subaccounts/operation/accountTransfer
     */
    public function accountTransfer(string $nonce, array $body): ResponseInterface;
}