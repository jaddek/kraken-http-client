<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Client;

use Jaddek\Kraken\Http\Client\Auth\Signer;
use Jaddek\Kraken\Http\Client\Auth\SignerInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class KrakenHttpClient implements KrakenHttpClientInterface
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly ?SignerInterface    $signer = null,
    )
    {

    }

    public static function createDefaultClient(?Signer $signer = null): static
    {
        $client = HttpClient::create()->withOptions([
            'base_uri' => 'https://api.kraken.com',
        ]);

        return new static($client, $signer);
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function ticker(array $query): ResponseInterface
    {
        return $this->httpClient->request('GET', '/0/public/Ticker', [
            'query' => $query
        ]);
    }

    public function orderAdd(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        $url  = '/0/private/AddOrder';
        $body = http_build_query($body);

        return $this->httpClient->request('POST', $url, [
            'body'    => $body,
            'headers' => $this->signer->getSignHeaders($url, $nonce, $body),
        ]);
    }

    public function orderAddBatch(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        $url = '/0/private/AddOrderBatch';
        $body = http_build_query($body);

        return $this->httpClient->request('POST', $url, [
            'body'    => $body,
            'headers' => $this->signer->getSignHeaders($url, $nonce, $body),
        ]);
    }

    public function orderEdit(array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/EditOrder', [
            'body' => $body
        ]);
    }

    public function orderCancel(array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/CancelOrder', [
            'body' => $body
        ]);
    }

    public function orderCancelAll(array $body): ResponseInterface
    {
        return $this->httpClient->request('POST', '/0/private/CancelAll', [
            'body' => $body
        ]);
    }

    public function orderCancelAfterX(array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/CancelAllOrdersAfter', [
            'body' => $body
        ]);
    }

    public function orderCancelBatch(array $body): ResponseInterface
    {
        $this->checkSigner();

        return $this->httpClient->request('POST', '/0/private/CancelOrderBatch', [
            'body' => $body
        ]);
    }

    public function getAccountBalance(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        $url  = '/0/private/Balance';
        $body = http_build_query($body);

        return $this->httpClient->request('POST', $url, [
            'body'    => $body,
            'headers' => $this->signer->getSignHeaders($url, $nonce, $body)
        ]);
    }

    public function getTradeBalance(string $nonce, array $body): ResponseInterface
    {
        $this->checkSigner();

        $url  = '/0/private/TradeBalance';
        $body = http_build_query($body);

        return $this->httpClient->request('POST', $url, [
            'body'    => $body,
            'headers' => $this->signer->getSignHeaders($url, $nonce, $body),
        ]);
    }


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
