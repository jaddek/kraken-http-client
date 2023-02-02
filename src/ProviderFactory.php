<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

use Jaddek\Kraken\Http\Client\Contract\KrakenHttpClientInterface;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Batch\Provider as OrderAddBatchProvider;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Provider as OrderAddProvider;
use Jaddek\Kraken\Http\Client\Provider\Ticker\Provider as TickerProvider;
use Jaddek\Kraken\Http\Client\Provider\User\Balance\Account\Provider as AccountBalanceProvider;
use Jaddek\Kraken\Http\Client\Provider\User\Balance\Trade\Provider as TradeBalanceProvider;
use Jaddek\Kraken\Http\Client\Provider\Time\Provider as ServerTimeProvider;
use Jaddek\Kraken\Http\Client\Provider\Status\Provider as SystemStatusProvider;
use Jaddek\Kraken\Http\Client\Provider\AssetInfo\Provider as AssetInfoProvider;
use Jaddek\Kraken\Http\Client\Provider\TradableAssetPairs\Provider as TradableAssetPairsProvider;
use Jaddek\Kraken\Http\Client\Provider\OHLCData\Provider as OHLCDataProvider;
use Jaddek\Kraken\Http\Client\Provider\OrderBook\Provider as OrderBookProvider;
use Jaddek\Kraken\Http\Client\Provider\RecentTrades\Provider as RecentTradesProvider;
use Jaddek\Kraken\Http\Client\Provider\RecentSpreads\Provider as RecentSpreadsProvider;
use Jaddek\Kraken\Http\Client\Provider\Websocket\Provider as WebsocketTokenProvider;
use Jaddek\Kraken\Http\Client\Provider\Order\Edit\Provider as OrderEditProvider;

class ProviderFactory
{
    public function __construct(
        private readonly KrakenHttpClientInterface $krakenHttpClient,
    )
    {
    }

    /**
     * @return TickerProvider
     */
    public function getTickerProvider(): TickerProvider
    {
        return TickerProvider::getInstance($this->krakenHttpClient);
    }

    public function getOrderAddProvider(): OrderAddProvider
    {
        return OrderAddProvider::getInstance($this->krakenHttpClient);
    }

    public function getOrderAddBatchProvider(): OrderAddBatchProvider
    {
        return OrderAddBatchProvider::getInstance($this->krakenHttpClient);
    }

    public function getUserAccountBalanceProvider(): AccountBalanceProvider
    {
        return AccountBalanceProvider::getInstance($this->krakenHttpClient);
    }

    public function getUserTradeBalanceProvider(): TradeBalanceProvider
    {
        return TradeBalanceProvider::getInstance($this->krakenHttpClient);
    }

    public function getServerTimeProvider(): ServerTimeProvider
    {
        return ServerTimeProvider::getInstance($this->krakenHttpClient);
    }

    public function getSystemStatusProvider(): SystemStatusProvider
    {
        return SystemStatusProvider::getInstance($this->krakenHttpClient);
    }

    public function getAssetInfoProvider(): AssetInfoProvider
    {
        return AssetInfoProvider::getInstance($this->krakenHttpClient);
    }

    public function getTradableAssetPairsProvider(): TradableAssetPairsProvider
    {
        return TradableAssetPairsProvider::getInstance($this->krakenHttpClient);
    }

    public function getOHLCDataProvider(): OHLCDataProvider
    {
        return OHLCDataProvider::getInstance($this->krakenHttpClient);
    }

    public function getOrderBookProvider(): OrderBookProvider
    {
        return OrderBookProvider::getInstance($this->krakenHttpClient);
    }

    public function getRecentTradesProvider(): RecentTradesProvider
    {
        return RecentTradesProvider::getInstance($this->krakenHttpClient);
    }

    public function getRecentSpreadsProvider(): RecentSpreadsProvider
    {
        return RecentSpreadsProvider::getInstance($this->krakenHttpClient);
    }

    public function getWebsocketTokenProvider(): WebsocketTokenProvider
    {
        return WebsocketTokenProvider::getInstance($this->krakenHttpClient);
    }

    public function getOrderEditProvider(): OrderEditProvider
    {
        return OrderEditProvider::getInstance($this->krakenHttpClient);
    }

}