<?php

namespace Tests\Unit;

use Illuminate\Support\Collection;
use Tests\TestCase;

class CollectionMacrosTest extends TestCase
{
    /** @test */
    public function it_can_transform_to_associative_array()
    {
        $collection = collect([
            ['id' => 1, 'name' => 'Alice'],
            ['id' => 2, 'name' => 'Bob'],
        ]);

        $assoc = $collection->toAssocArray('id', 'name');

        $this->assertIsArray($assoc);
        $this->assertSame([
            1 => 'Alice',
            2 => 'Bob',
        ], $assoc);
    }

    /** @test */
    public function it_returns_empty_array_when_collection_empty_in_toAssocArray()
    {
        $collection = collect([]);

        $assoc = $collection->toAssocArray('id', 'name');

        $this->assertIsArray($assoc);
        $this->assertEmpty($assoc);
    }

    /** @test */
    public function it_can_group_by_first_letter_of_values()
    {
        $collection = collect(['Apple', 'Banana', 'Avocado', 'Blueberry', 'Cherry']);

        $grouped = $collection->groupByFirstLetter();

        $this->assertInstanceOf(Collection::class, $grouped);
        $this->assertArrayHasKey('A', $grouped->toArray());
        $this->assertArrayHasKey('B', $grouped->toArray());
        $this->assertArrayHasKey('C', $grouped->toArray());
        $this->assertSame(['Apple', 'Avocado'], $grouped['A']->toArray());
        $this->assertSame(['Banana', 'Blueberry'], $grouped['B']->toArray());
        $this->assertSame(['Cherry'], $grouped['C']->toArray());
    }

    /** @test */
    public function it_can_group_by_first_letter_of_field_value()
    {
        $collection = collect([
            ['name' => 'Alice'],
            ['name' => 'Arnold'],
            ['name' => 'Brian'],
            ['name' => 'Bobby'],
        ]);

        $grouped = $collection->groupByFirstLetter('name');

        $this->assertInstanceOf(Collection::class, $grouped);
        $this->assertSame(['Alice', 'Arnold'], $grouped['A']->pluck('name')->toArray());
        $this->assertSame(['Brian', 'Bobby'], $grouped['B']->pluck('name')->toArray());
    }

    /** @test */
    public function it_handles_empty_collection_in_groupByFirstLetter()
    {
        $collection = collect([]);

        $grouped = $collection->groupByFirstLetter();

        $this->assertInstanceOf(Collection::class, $grouped);
        $this->assertTrue($grouped->isEmpty());
    }
}
