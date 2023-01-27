<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Contract;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface UserStakingInterface
{
    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Staking/operation/stake
     */
    public function stakeAsset(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Staking/operation/unstake
     */
    public function unStakeAsset(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Staking/operation/getStakingAssetInfo
     */
    public function getListOfStakeableAssets(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Staking/operation/getStakingPendingDeposits
     */
    public function getPendingStakingTransactions(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Staking/operation/getStakingTransactions
     */
    public function getListOfStakingTransactions(string $nonce, array $body): ResponseInterface;

}