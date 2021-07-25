<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Response;

use JetBrains\PhpStorm\Pure;

class Rate
{
    private string $keyword;
    private string $rate;

    #[Pure]
    public function __construct(array $data)
    {
        $this->keyword = $pairKeyword = $this->findCurrentPair($data);
        $this->rate    = (string)($data[$pairKeyword]['c'][0] ?? '0');
    }

    private function findCurrentPair(array $data): string
    {
        return array_key_first($data);
    }

    public function getAmount(): ?string
    {
        return '1';
    }

    public function getProvider(): ?string
    {
        return null;
    }

    public function getTotalAmount(): ?string
    {
        return null;
    }

    public function getFrom(): ?string
    {
        return null;
    }

    public function getTo(): ?string
    {
        return null;
    }

    public function getRate(): ?string
    {
        return $this->rate;
    }

    public function getKeyword(): string
    {
        return $this->keyword;
    }
}
