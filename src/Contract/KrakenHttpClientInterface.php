<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Contract;

interface KrakenHttpClientInterface extends
    UserDataInterface,
    UserTradingInterface,
    MarketDataInterface,
    UserStakingInterface,
    UserSubAccountsInterface,
    UserFundingInterface,
    WebSocketInterface
{

}