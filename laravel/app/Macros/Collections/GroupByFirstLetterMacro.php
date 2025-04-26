<?php

namespace App\Macros\Collection;

use Illuminate\Support\Collection;

class GroupByFirstLetterMacro
{
    public function __invoke()
    {
        return function (string $field = null): Collection {
            return $this->groupBy(function ($item) use ($field) {
                $value = $field ? data_get($item, $field) : $item;
                return strtoupper(substr($value, 0, 1));
            });
        };
    }
}
