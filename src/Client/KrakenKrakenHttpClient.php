<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Client;

use Jaddek\Kraken\Http\Client\Auth\Signer;
use Jaddek\Kraken\Http\Client\Auth\SignerInterface;
use Jaddek\Kraken\Http\Client\Contract\KrakenHttpClientInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class KrakenKrakenHttpClient implements KrakenHttpClientInterface
{
    final public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly ?SignerInterface        $signer = null,
    )
    {

    }

    public static function createDefaultClient(?Signer $signer = null): KrakenKrakenHttpClient
    {
        $client = HttpClient::create()->withOptions([
            'base_uri' => 'https://api.kraken.com',
        ]);

        return new KrakenKrakenHttpClient($client, $signer);
    }

    /**
     *********************************************************
     * Private methods
     *
     * User Trading
     *********************************************************
     */


    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function orderAdd(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        $url  = '/0/private/AddOrder';
        $body = http_build_query($body);

        return $this->httpClient->request('POST', $url, [
            'body'    => $body,
            'headers' => $this->signer?->getSignHeaders($url, $nonce, $body),
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function orderAddBatch(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        $url  = '/0/private/AddOrderBatch';
        $body = http_build_query($body);

        return $this->httpClient->request('POST', $url, [
            'body'    => $body,
            'headers' => $this->signer?->getSignHeaders($url, $nonce, $body),
        ]);
    }

    /**
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function orderEdit(array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/EditOrder', [
            'body' => $body
        ]);
    }

    /**
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function orderCancel(array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/CancelOrder', [
            'body' => $body
        ]);
    }

    /**
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function orderCancelAll(array $body): ResponseInterface
    {
        return $this->httpClient->request('POST', '/0/private/CancelAll', [
            'body' => $body
        ]);
    }

    /**
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function orderCancelAfterX(array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/CancelAllOrdersAfter', [
            'body' => $body
        ]);
    }

    /**
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function orderCancelBatch(array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/CancelOrderBatch', [
            'body' => $body
        ]);
    }


    /** /User Trading */

    /**
     * User Data
     */

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getAccountBalance(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        $url  = '/0/private/Balance';
        $body = http_build_query($body);

        return $this->httpClient->request('POST', $url, [
            'body'    => $body,
            'headers' => $this->signer?->getSignHeaders($url, $nonce, $body)
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getTradeBalance(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        $url  = '/0/private/TradeBalance';
        $body = http_build_query($body);

        return $this->httpClient->request('POST', $url, [
            'body'    => $body,
            'headers' => $this->signer?->getSignHeaders($url, $nonce, $body),
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getOpenOrders(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/OpenOrders', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getClosedOrders(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/ClosedOrders', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getQueryOrderInfo(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/QueryOrders', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getTradesHistory(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/TradesHistory', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getQueryTradesInfo(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/QueryTrades', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getOpenPositions(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/OpenPositions', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getLedgersInfo(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/Ledgers', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getQueryLedgers(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/QueryLedgers', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getTradeVolume(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/TradeVolume', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function requestExportReport(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/AddExport', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function requestExportReportStatus(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/ExportStatus', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function retrieveDataExport(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/RetrieveExport', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function deleteDataExport(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/DeleteExport', [
            'body' => $body
        ]);
    }

    /** /User Data */

    /**
     * User Funding
     */

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getDepositMethods(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/DepositMethods', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getDepositAddresses(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/DepositAddresses', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getStatusOfRecentDeposits(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/DepositStatus', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getWithdrawalInformation(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/WithdrawInfo', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function withdrawFunds(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/Withdraw', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getStatusOfRecentWithdrawals(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/WithdrawStatus', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function requestWithdrawalCancellation(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/WithdrawCancel', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function requestWalletTransfer(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/WalletTransfer', [
            'body' => $body
        ]);
    }

    /** /User Funding */

    /**
     * User staking
     */

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function stakeAsset(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/Stake', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function unStakeAsset(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/Unstake', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getListOfStakeableAssets(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/Staking/Assets', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getPendingStakingTransactions(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/Staking/Pending', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getListOfStakingTransactions(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/Staking/Transactions', [
            'body' => $body
        ]);
    }

    /** /User staking */

    /**
     * User Sub Accounts
     */

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function createSubAccount(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/CreateSubaccount', [
            'body' => $body
        ]);
    }

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function accountTransfer(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/AccountTransfer', [
            'body' => $body
        ]);
    }

    /** /User Sub Accounts */

    /**
     *********************************************************
     * Public methods
     *
     * Market data
     *********************************************************
     */

    /**
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getServerTime(): ResponseInterface
    {
        return $this->httpClient->request('POST', '/0/public/Time');
    }

    /**
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getSystemStatus(): ResponseInterface
    {
        return $this->httpClient->request('POST', '/0/public/SystemStatus');
    }

    /**
     * @param array $query
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getAssetInfo(array $query): ResponseInterface
    {
        return $this->httpClient->request('GET', '/0/public/Assets', [
            'query' => $query
        ]);
    }

    /**
     * @param array $query
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getTradableAssetPairs(array $query): ResponseInterface
    {
        return $this->httpClient->request('GET', '/0/public/AssetPairs', [
            'query' => $query
        ]);
    }

    /**
     * @param array $query
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getTickerInformation(array $query): ResponseInterface
    {
        return $this->httpClient->request('GET', '/0/public/Ticker', [
            'query' => $query
        ]);
    }

    public function getOHLCData(array $query): ResponseInterface
    {
        return $this->httpClient->request('GET', '/0/public/OHLC', [
            'query' => $query
        ]);
    }

    /**
     * @param array $query
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getOrderBook(array $query): ResponseInterface
    {
        return $this->httpClient->request('GET', '/0/public/Depth', [
            'query' => $query
        ]);
    }

    /**
     * @param array $query
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getRecentTrades(array $query): ResponseInterface
    {
        return $this->httpClient->request('GET', '/0/public/Trades', [
            'query' => $query
        ]);
    }

    /**
     * @param array $query
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function getRecentSpreads(array $query): ResponseInterface
    {
        return $this->httpClient->request('GET', '/0/public/Spread', [
            'query' => $query
        ]);
    }

    /**
     * @return void
     */
    private function checkSigner(): void
    {
        if (!$this->signer instanceof Signer) {
            throw new \RuntimeException('For using private methods, signer should be configured');
        }

        if (!$this->signer->isConfigured()) {
            throw new \RuntimeException('Signer has invalid key or secret');
        }
    }
}
