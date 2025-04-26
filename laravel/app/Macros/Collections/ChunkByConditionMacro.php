<?php

namespace App\Macros\Collection;

use Illuminate\Support\Collection;

class ChunkByConditionMacro
{
    public function __invoke()
    {
        return function (callable $callback): Collection {
            $chunks = new Collection();
            $currentChunk = new Collection();

            foreach ($this as $item) {
                if ($currentChunk->isEmpty() || $callback($currentChunk->last(), $item)) {
                    $currentChunk->push($item);
                } else {
                    $chunks->push($currentChunk);
                    $currentChunk = new Collection([$item]);
                }
            }

            if ($currentChunk->isNotEmpty()) {
                $chunks->push($currentChunk);
            }

            return $chunks;
        };
    }
}
