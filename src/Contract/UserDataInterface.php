<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Contract;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface UserDataInterface
{
    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/getAccountBalance
     */
    public function getAccountBalance(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/getTradeBalance
     */
    public function getTradeBalance(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/getOpenOrders
     */
    public function getOpenOrders(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/getClosedOrders
     */
    public function getClosedOrders(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/getOrdersInfo
     */
    public function getQueryOrderInfo(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/getTradesHistory
     */
    public function getTradesHistory(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/getQueryTradesInfo
     */
    public function getQueryTradesInfo(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/getOpenPositions
     */
    public function getOpenPositions(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/getLedgersInfo
     */
    public function getLedgersInfo(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/getQueryLedgers
     */
    public function getQueryLedgers(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/getTradeVolume
     */
    public function getTradeVolume(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/addExport
     */
    public function requestExportReport(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/exportStatus
     */
    public function requestExportReportStatus(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/retrieveExport
     */
    public function retrieveDataExport(string $nonce, array $body): ResponseInterface;

    /**
     * @param string $nonce
     * @param array $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Data/operation/removeExport
     */
    public function deleteDataExport(string $nonce, array $body): ResponseInterface;
}
