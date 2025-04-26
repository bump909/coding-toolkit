# Laravel Collection Macros

A curated set of custom [Laravel Collection macros](https://laravel.com/docs/collections#extending-collections) to extend the power of collections in your Laravel projects.

These are designed for practical use, readability, and reusability in real-world apps. Each macro is **unit-tested** and follows **clean code principles**.

---

## Macros Included

### `toAssocArray($key, $value)`

Transforms a collection of arrays or objects into an associative array using the specified key/value fields.

```php
collect([
    ['id' => 1, 'name' => 'Alice'],
    ['id' => 2, 'name' => 'Bob'],
])->toAssocArray('id', 'name');

// Output:
[
    1 => 'Alice',
    2 => 'Bob'
]
```

### `groupByFirstLetter($field = null)`

Groups string values (or field values from objects/arrays) by their first letter (case-insensitive).

```
collect(['Apple', 'Banana', 'Avocado'])->groupByFirstLetter();

// Output:
[
    'A' => ['Apple', 'Avocado'],
    'B' => ['Banana']
]
```

### `chunkByCondition(callable $callback)`

Smartly chunks a collection by comparing each item to the previous item using a callback.

```
$collection = collect([1, 2, 3, 10, 11, 20, 30]);

$chunks = $collection->chunkByCondition(function ($prev, $curr) {
    return abs($prev - $curr) <= 5;
});

// Output:
// [
//     [1, 2, 3],
//     [10, 11],
//     [20],
//     [30]
// ]
```

### `randomGroups(int $groups)`

Splits a collection into a given number of groups with randomized distribution.

```
collect(range(1, 9))->randomGroups(3);

// Output: 3 randomized groups (approx 3 items each)
```

### Tests

All macros are fully tested using Laravel's built-in testing framework.

```
php artisan test --testsuite=Unit
# or
vendor/bin/phpunit
```

### File Structure

```
Macros/
├── Collection/
│   ├── ToAssocArrayMacro.php
│   ├── GroupByFirstLetterMacro.php
│   ├── ChunkByConditionMacro.php
│   └── RandomGroupsMacro.php
tests/
└── Unit/
    ├── CollectionMacrosTest.php
    └── AdvancedCollectionMacrosTest.php
```

### Registering Macros
In your bootstrap/macros.php or a service provider:

```
use Illuminate\Support\Collection;
use App\Macros\Collection\ToAssocArrayMacro;
use App\Macros\Collection\GroupByFirstLetterMacro;
use App\Macros\Collection\ChunkByConditionMacro;
use App\Macros\Collection\RandomGroupsMacro;

Collection::macro('toAssocArray', app(ToAssocArrayMacro::class));
Collection::macro('groupByFirstLetter', app(GroupByFirstLetterMacro::class));
Collection::macro('chunkByCondition', app(ChunkByConditionMacro::class));
Collection::macro('randomGroups', app(RandomGroupsMacro::class));
```
