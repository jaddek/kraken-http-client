<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

use Jaddek\Kraken\Http\Client\Contract\KrakenHttpClientInterface;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Batch\Provider as OrderAddBatchProvider;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Provider as OrderAddProvider;
use Jaddek\Kraken\Http\Client\Provider\Ticker\Provider as TickerProvider;
use Jaddek\Kraken\Http\Client\Provider\User\Balance\Account\Provider as AccountBalanceProvider;
use Jaddek\Kraken\Http\Client\Provider\User\Balance\Trade\Provider as TradeBalanceProvider;

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
}