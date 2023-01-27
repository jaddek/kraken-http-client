<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Contract;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface MarketDataInterface
{
    /**
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/Market-Data/operation/getServerTime
     */
    public function getServerTime(): ResponseInterface;

    /**
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/Market-Data/operation/getSystemStatus
     */
    public function getSystemStatus(): ResponseInterface;

    /**
     * @param array $query
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/Market-Data/operation/getAssetInfo
     */
    public function getAssetInfo(array $query): ResponseInterface;

    /**
     * @param array $query
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/Market-Data/operation/getTradableAssetPairs
     */
    public function getTradableAssetPairs(array $query): ResponseInterface;

    /**
     * @param array $query
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/Market-Data/operation/getTickerInformation
     */
    public function getTickerInformation(array $query): ResponseInterface;

    /**
     * @param array $query
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/Market-Data/operation/getOHLCData
     */
    public function getOHLCData(array $query): ResponseInterface;

    /**
     * @param array $query
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/Market-Data/operation/getOrderBook
     */
    public function getOrderBook(array $query): ResponseInterface;

    /**
     * @param array $query
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/Market-Data/operation/getRecentTrades
     */
    public function getRecentTrades(array $query): ResponseInterface;

    /**
     * @param array $query
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/Market-Data/operation/getRecentSpreads
     */
    public function getRecentSpreads(array $query): ResponseInterface;
}
