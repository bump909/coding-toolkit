<?php

namespace App\Macros\Collection;

use Illuminate\Support\Collection;

class RandomGroupsMacro
{
    public function __invoke()
    {
        return function (int $groups): Collection {
            $shuffled = $this->shuffle();
            return $shuffled->chunk(ceil($shuffled->count() / $groups));
        };
    }
}
