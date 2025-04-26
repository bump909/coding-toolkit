<?php

namespace App\Macros\Collection;

use Illuminate\Support\Collection;

class ToAssocArrayMacro
{
    public function __invoke()
    {
        return function (string $keyField, string $valueField): array {
            return $this->pluck($valueField, $keyField)->toArray();
        };
    }
}
