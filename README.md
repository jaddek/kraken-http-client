# Documentation source
Date of documentation: 24.01.2023

Kraken REST API: https://docs.kraken.com/rest/

# Usage

## Public API

### Ticker

```php
require 'vendor/autoload.php';

use Jaddek\Kraken\Http\Client\Client\KrakenHttpClient;
use Jaddek\Kraken\Http\Client\Crypto;
use Jaddek\Kraken\Http\Client\Fiat;
use Jaddek\Kraken\Http\Client\Provider\Ticker\RequestQuery;
use Jaddek\Kraken\Http\Client\ProviderFactory;

$query = new RequestQuery();
$query->addPair(Crypto::LTC, Fiat::EUR);

$httpClient = KrakenHttpClient::createDefaultClient();
$factory    = new ProviderFactory($httpClient);

$provider = $factory->getTickerProvider();
$provider->detachErrorCallback(); // detach exception throwing

$result = $provider($query);

```

## Private API

### User data

#### Account balance

```php
require 'vendor/autoload.php';

use Jaddek\Kraken\Http\Client\Client\KrakenHttpClient;
use Jaddek\Kraken\Http\Client\ProviderFactory;
use Jaddek\Kraken\Http\Client\Auth\Signer;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\RequestBody;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Request\Order;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOrderType;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOperationType;

const SECRET = '';
const KEY = '';

$signer     = new Signer(key: KEY, secret: SECRET);
$httpClient = KrakenHttpClient::createDefaultClient($signer);
$factory    = new ProviderFactory($httpClient);

$provider = $factory->getUserAccountBalanceProvider();
$provider->detachErrorCallback(); // detach exception throwing
$result = $provider();

```

#### Trade balance

```php
require 'vendor/autoload.php';

use Jaddek\Kraken\Http\Client\Client\KrakenHttpClient;
use Jaddek\Kraken\Http\Client\ProviderFactory;
use Jaddek\Kraken\Http\Client\Auth\Signer;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\RequestBody;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Request\Order;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOrderType;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOperationType;

const SECRET = '';
const KEY = '';

$signer     = new Signer(key: KEY, secret: SECRET);
$httpClient = KrakenHttpClient::createDefaultClient($signer);
$factory    = new ProviderFactory($httpClient);

$provider = $factory->getUserTradeBalanceProvider();
$provider->detachErrorCallback(); // detach exception throwing
$result = $provider();
```

### User trading

#### Create single order
```php
require 'vendor/autoload.php';

use Jaddek\Kraken\Http\Client\Client\KrakenHttpClient;
use Jaddek\Kraken\Http\Client\ProviderFactory;
use Jaddek\Kraken\Http\Client\Auth\Signer;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\RequestBody;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\Single\Request\Order;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOrderType;
use Jaddek\Kraken\Http\Client\Provider\Order\Add\EnumOperationType;

const SECRET = '';
const KEY = '';

$signer     = new Signer(key: KEY, secret: SECRET);
$httpClient = KrakenHttpClient::createDefaultClient($signer);
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