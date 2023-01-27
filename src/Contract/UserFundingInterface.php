<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Contract;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface UserFundingInterface
{
    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Funding/operation/getDepositMethods
     */
    public function getDepositMethods(string $nonce, array $body): ResponseInterface;

    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Funding/operation/getDepositAddresses
     */
    public function getDepositAddresses(string $nonce, array $body): ResponseInterface;

    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Funding/operation/getStatusRecentDeposits
     */
    public function getStatusOfRecentDeposits(string $nonce, array $body): ResponseInterface;

    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Funding/operation/getWithdrawalInformation
     */
    public function getWithdrawalInformation(string $nonce, array $body): ResponseInterface;

    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Funding/operation/withdrawFunds
     */
    public function withdrawFunds(string $nonce, array $body): ResponseInterface;

    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Funding/operation/getStatusRecentWithdrawals
     */
    public function getStatusOfRecentWithdrawals(string $nonce, array $body): ResponseInterface;

    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Funding/operation/cancelWithdrawal
     */
    public function requestWithdrawalCancellation(string $nonce, array $body): ResponseInterface;

    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Funding/operation/walletTransfer
     */
    public function requestWalletTransfer(string $nonce, array $body): ResponseInterface;
}