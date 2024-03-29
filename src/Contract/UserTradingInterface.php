<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Contract;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface UserTradingInterface
{
    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Trading/operation/addOrder
     */
    public function orderAdd(string $nonce, array $body): ResponseInterface;

    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Trading/operation/addOrderBatch
     */
    public function orderAddBatch(string $nonce, array $body): ResponseInterface;

    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Trading/operation/editOrder
     */
    public function orderEdit(array $body): ResponseInterface;

    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Trading/operation/cancelOrder
     */
    public function orderCancel(array $body): ResponseInterface;

    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Trading/operation/cancelAllOrders
     */
    public function orderCancelAll(array $body): ResponseInterface;

    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Trading/operation/cancelAllOrdersAfter
     */
    public function orderCancelAfterX(array $body): ResponseInterface;

    /**
     * @param array<string, mixed> $body
     * @return ResponseInterface
     *
     * @see https://docs.kraken.com/rest/#tag/User-Trading/operation/cancelOrderBatch
     */
    public function orderCancelBatch(array $body): ResponseInterface;
}
