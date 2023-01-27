<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

trait ArrayTrait
{
    public function toArray(bool $withoutNulls = true): array
    {
        $data = get_object_vars($this);
        foreach ($data as $key => &$var) {
            if ($var instanceof ArrayInterface) {
                $var = $var->toArray();
                continue;
            }

            if ($var instanceof \UnitEnum) {
                $var = $var->value;
                continue;
            }

            if ($var === null) {
                unset($data[$key]);
            }
        }

        return $data;
    }
}