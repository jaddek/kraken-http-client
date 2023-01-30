# Documentation source

Date of documentation: 24.01.2023

Kraken REST API: https://docs.kraken.com/rest/

# Usage

## Public API

### Get Server Time

```php
require 'vendor/autoload.php';

use \Jaddek\Kraken\Http\Client\Client\KrakenKrakenHttpClient;
use \Jaddek\Kraken\Http\Client\ProviderFactory;

$httpClient = KrakenKrakenHttpClient::createDefaultClient();
$factory    = new ProviderFactory($httpClient);

$provider = $factory->getServerTimeProvider();
$provider->detachErrorCallback(); // detach exception throwing
$result = $provider();

```

### Get System Status

```php
require 'vendor/autoload.php';

use \Jaddek\Kraken\Http\Client\Client\KrakenKrakenHttpClient;
use \Jaddek\Kraken\Http\Client\ProviderFactory;

$httpClient = KrakenKrakenHttpClient::createDefaultClient();
$factory    = new ProviderFactory($httpClient);

$provider = $factory->getSystemStatusProvider();
$provider->detachErrorCallback(); // detach exception throwing
$result = $provider();
```

### Get Asset Info

```php
require 'vendor/autoload.php';

use \Jaddek\Kraken\Http\Client\Client\KrakenKrakenHttpClient;
use \Jaddek\Kraken\Http\Client\ProviderFactory;

$httpClient = KrakenKrakenHttpClient::createDefaultClient();
$factory    = new ProviderFactory($httpClient);

$query = new \Jaddek\Kraken\Http\Client\Provider\AssetInfo\RequestQuery();
$query->addCoin(\Jaddek\Kraken\Http\Client\Crypto::AAVE);
$query->addCoin(\Jaddek\Kraken\Http\Client\Crypto::BCH);

$provider = $factory->getAssetInfoProvider();
$provider->detachErrorCallback(); // detach exception throwing
$result = $provider($query);
```

### Get Tradable Asset Pairs

```php
require 'vendor/autoload.php';

use \Jaddek\Kraken\Http\Client\Client\KrakenKrakenHttpClient;
use \Jaddek\Kraken\Http\Client\ProviderFactory;
use \Jaddek\Kraken\Http\Client\Provider\TradableAssetPairs\RequestQuery;
use \Jaddek\Kraken\Http\Client\Fiat;
use \Jaddek\Kraken\Http\Client\Crypto;

$httpClient = KrakenKrakenHttpClient::createDefaultClient();
$factory    = new ProviderFactory($httpClient);

$query = new RequestQuery();
$query->addPair(Crypto::BTC, Fiat::EUR);
$query->addPair(Crypto::ETH, Fiat::EUR);
$query->setLevelInfo(); // default
$query->setLevelMargin();
$query->setLevelFees();
$query->setLevelInfo();

$provider = $factory->getTradableAssetPairsProvider();
$provider->detachErrorCallback();
$result = $provider($query);
```

### Get Ticker Information

```php
require 'vendor/autoload.php';

use \Jaddek\Kraken\Http\Client\Client\KrakenKrakenHttpClient;
use \Jaddek\Kraken\Http\Client\Crypto;
use \Jaddek\Kraken\Http\Client\Fiat;
use \Jaddek\Kraken\Http\Client\Provider\Ticker\RequestQuery;
use \Jaddek\Kraken\Http\Client\ProviderFactory;

$query = new RequestQuery();
$query->addPair(Crypto::LTC, Fiat::EUR);

$httpClient = KrakenKrakenHttpClient::createDefaultClient();
$factory    = new ProviderFactory($httpClient);

$provider = $factory->getTickerProvider();
$provider->detachErrorCallback(); // detach exception throwing

$result = $provider($query);
```

### Get OHLC Data

```php
require 'vendor/autoload.php';

use \Jaddek\Kraken\Http\Client\Client\KrakenKrakenHttpClient;
use \Jaddek\Kraken\Http\Client\ProviderFactory;
use \Jaddek\Kraken\Http\Client\Provider\OHLCData\RequestQuery;
use \Jaddek\Kraken\Http\Client\Fiat;
use \Jaddek\Kraken\Http\Client\Crypto;
use \Jaddek\Kraken\Http\Client\Provider\OHLCData\IntervalEnum;

$httpClient = KrakenKrakenHttpClient::createDefaultClient();
$factory    = new ProviderFactory($httpClient);

$query = new RequestQuery(
    pair: Crypto::BTC->value.Fiat::EUR->value,
    interval: IntervalEnum::DAYS_15,
    since: time()
);

$provider = $factory->getOHLCDataProvider();
$provider->detachErrorCallback();
$result = $provider($query);
```

### Get Order Book

```php
require 'vendor/autoload.php';

use \Jaddek\Kraken\Http\Client\Client\KrakenKrakenHttpClient;
use \Jaddek\Kraken\Http\Client\ProviderFactory;
use \Jaddek\Kraken\Http\Client\Provider\OrderBook\RequestQuery;
use \Jaddek\Kraken\Http\Client\Fiat;
use \Jaddek\Kraken\Http\Client\Crypto;

$httpClient = KrakenKrakenHttpClient::createDefaultClient();
$factory    = new ProviderFactory($httpClient);

$query = new RequestQuery(
    pair: Crypto::BTC->value.Fiat::EUR->value,
    count: 10
);

$provider = $factory->getOrderBookProvider();
$provider->detachErrorCallback();
$result = $provider($query);
```

### Get Recent Trades

```php
require 'vendor/autoload.php';

use \Jaddek\Kraken\Http\Client\Client\KrakenKrakenHttpClient;
use \Jaddek\Kraken\Http\Client\ProviderFactory;
use \Jaddek\Kraken\Http\Client\Provider\RecentTrades\RequestQuery;
use \Jaddek\Kraken\Http\Client\Fiat;
use \Jaddek\Kraken\Http\Client\Crypto;

$httpClient = KrakenKrakenHttpClient::createDefaultClient();
$factory    = new ProviderFactory($httpClient);

$query = new RequestQuery(
    pair: Crypto::BTC->value.Fiat::EUR->value,
);

$provider = $factory->getRecentTradesProvider();
$provider->detachErrorCallback();
$result = $provider($query);
```

### Get Recent Spreads

```php
require 'vendor/autoload.php';

use \Jaddek\Kraken\Http\Client\Client\KrakenKrakenHttpClient;
use \Jaddek\Kraken\Http\Client\ProviderFactory;
use \Jaddek\Kraken\Http\Client\Provider\RecentSpreads\RequestQuery;
use \Jaddek\Kraken\Http\Client\Fiat;
use \Jaddek\Kraken\Http\Client\Crypto;

$httpClient = KrakenKrakenHttpClient::createDefaultClient();
$factory    = new ProviderFactory($httpClient);

$query = new RequestQuery(
    pair: Crypto::BTC->value.Fiat::EUR->value,
);

$provider = $factory->getRecentSpreadsProvider();
$provider->detachErrorCallback();
$result = $provider($query);

```

## Private API

### User data

#### Account balance

```php
require 'vendor/autoload.php';

use \Jaddek\Kraken\Http\Client\Client\KrakenKrakenHttpClient;
use \Jaddek\Kraken\Http\Client\ProviderFactory;
use \Jaddek\Kraken\Http\Client\Auth\Signer;
use \Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\RequestBody;
use \Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Request\Order;
use \Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOrderType;
use \Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOperationType;

const SECRET = '';
const KEY = '';

$signer     = new Signer(key: KEY, secret: SECRET);
$httpClient = KrakenKrakenHttpClient::createDefaultClient($signer);
$factory    = new ProviderFactory($httpClient);

$provider = $factory->getUserAccountBalanceProvider();
$provider->detachErrorCallback(); // detach exception throwing
$result = $provider();

```

#### Trade balance

```php
require 'vendor/autoload.php';

use \Jaddek\Kraken\Http\Client\Client\KrakenKrakenHttpClient;
use \Jaddek\Kraken\Http\Client\ProviderFactory;
use \Jaddek\Kraken\Http\Client\Auth\Signer;
use \Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\RequestBody;
use \Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Request\Order;
use \Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOrderType;
use \Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOperationType;

const SECRET = '';
const KEY = '';

$signer     = new Signer(key: KEY, secret: SECRET);
$httpClient = KrakenKrakenHttpClient::createDefaultClient($signer);
$factory    = new ProviderFactory($httpClient);

$provider = $factory->getUserTradeBalanceProvider();
$provider->detachErrorCallback(); // detach exception throwing
$result = $provider();
```

### User trading

#### Add single order

```php
require 'vendor/autoload.php';

use \Jaddek\Kraken\Http\Client\Client\KrakenKrakenHttpClient;
use \Jaddek\Kraken\Http\Client\ProviderFactory;
use \Jaddek\Kraken\Http\Client\Auth\Signer;
use \Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\RequestBody;
use \Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Request\Order;
use \Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOrderType;
use \Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOperationType;

const SECRET = '';
const KEY = '';

$signer     = new Signer(key: KEY, secret: SECRET);
$httpClient = KrakenKrakenHttpClient::createDefaultClient($signer);
$factory    = new ProviderFactory($httpClient);


$data = new RequestBody(
    order: new Order(
        ordertype: EnumOrderType::MARKET,
        type: EnumOperationType::SELL,
        volume: '0.06',
    ),
    pair: 'LTCEUR',
    validate: false
);


$provider = $factory->getOrderAddProvider();
$provider->detachErrorCallback(); // detach exception throwing
$result   = $provider($data);
```

### Add Order Batch

### Edit Order

### Cancel Order

### Cancel All Orders

### Cancel All Orders After X

### Cancel Order Batch

## User Funding

### Get Deposit Methods

### Get Deposit Addresses

### Get Status Recent Deposits

### Get Withdrawal Information

### Withdraw Funds

### Status Recent Withdrawals

### Cancel Withdrawal

### Wallet Transfer

## User Subaccounts

### Create Sub Account

### Account Transfer

## User Staking

### Stake Asset

### Un Stake Asset

### List of Stakeable Assets

### Pending Staking Transactions

### List of Staking Transactions

## Websocket

### Get WebSocket Token

```php
require 'vendor/autoload.php';

use Jaddek\Kraken\Http\Client\Auth\Signer;
use Jaddek\Kraken\Http\Client\Client\KrakenKrakenHttpClient;
use Jaddek\Kraken\Http\Client\ProviderFactory;

const SECRET = '';
const KEY = '';

$signer     = new Signer(key: KEY, secret: SECRET);
$httpClient = KrakenKrakenHttpClient::createDefaultClient($signer);
$factory    = new ProviderFactory($httpClient);

$provider = $factory->getWebsocketTokenProvider();
$provider->detachErrorCallback();
$result = $provider();
```


## Exceptions

**Base exception**

```php
\Jaddek\Kraken\Http\Client\KrakenException::class
```

**KrakenValidationException**

Applicable for create order. Validator checks min volume operation validation.

```php
\Jaddek\Kraken\Http\Client\KrakenValidationException::class
```

Min Volume list:

```php
\Jaddek\Kraken\Http\Client\MinTradeLimits::class
```

**Client exception**

```php
\Jaddek\Kraken\Http\Client\Client\KrakenHttpException::class
```

List of Kraken errors:

```php
\Jaddek\Kraken\Http\Client\Client\KrakenErrors::class
```