<?php

namespace Tests\Unit;

use Illuminate\Support\Collection;
use Tests\TestCase;

class AdvancedCollectionMacrosTest extends TestCase
{
    /** @test */
    public function it_can_chunk_collection_by_condition()
    {
        $collection = collect([1, 2, 3, 10, 11, 20, 30]);

        $chunks = $collection->chunkByCondition(function ($prev, $curr) {
            return abs($prev - $curr) <= 5;
        });

        $this->assertInstanceOf(Collection::class, $chunks);
        $this->assertCount(4, $chunks);

        $this->assertEquals([1, 2, 3], $chunks[0]->toArray());
        $this->assertEquals([10, 11], $chunks[1]->toArray());
        $this->assertEquals([20], $chunks[2]->toArray());
        $this->assertEquals([30], $chunks[3]->toArray());
    }

    /** @test */
    public function it_handles_empty_collection_in_chunk_by_condition()
    {
        $collection = collect([]);

        $chunks = $collection->chunkByCondition(fn($a, $b) => true);

        $this->assertTrue($chunks->isEmpty());
    }

    /** @test */
    public function it_can_split_collection_into_random_groups()
    {
        $collection = collect(range(1, 10));

        $groups = $collection->randomGroups(3);

        $this->assertInstanceOf(Collection::class, $groups);
        $this->assertCount(3, $groups);

        $flattened = $groups->flatten()->sort()->values();
        $this->assertEquals($collection->sort()->values(), $flattened);
    }

    /** @test */
    public function it_handles_more_groups_than_items_in_random_groups()
    {
        $collection = collect(['A', 'B']);

        $groups = $collection->randomGroups(5);

        // It should create at least one group per item
        $this->assertInstanceOf(Collection::class, $groups);
        $this->assertLessThanOrEqual(5, $groups->count());
        $this->assertEquals(['A', 'B'], $groups->flatten()->sort()->values()->toArray());
    }
}
