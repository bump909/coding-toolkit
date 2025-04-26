# Coding Toolkit for Laravel & PHP

A carefully crafted collection of Laravel and PHP tools to speed up your development workflows, demonstrate best practices, and build smarter applications.

This toolkit includes **custom macros**, **artisan commands**, **helpers**, **casts**, **policies**, and **unit tests**, all designed to be plug-and-play into any Laravel project.

---

## What's Inside

### Laravel

#### Artisan Commands (`laravel/app/Console/Commands/`)

- `ClearLogFile.php` — Instantly clear your Laravel log file.
- `GenerateSitemap.php` — Create dynamic sitemaps.
- `RemoveInactiveGuestCarts.php` — Clean up abandoned shopping carts.
- `SendTestMailCommand.php` — Quickly send test emails.
- `TestQueueCommand.php` — Dispatch test jobs onto queues.

#### Collection Macros (`laravel/app/Macros/Collections/`)

Reusable, smart Laravel Collection macros:

- `ChunkByConditionMacro.php` — Chunk a collection dynamically based on conditions.
- `GroupByFirstLetterMacro.php` — Group items by their starting letter.
- `RandomGroupsMacro.php` — Split collections into random groups.
- `ToAssocArrayMacro.php` — Quickly map collections into key/value arrays.

See full [Collection Macros README](laravel/app/Macros/Collections/README.md).

#### Helpers (`laravel/app/Helpers/`)

Global PHP functions to speed up day-to-day coding:

- `array_helpers.php` — Useful array utilities.
- `string_helpers.php` — Helpful string manipulation functions.
- `helpers.php` — Centralized helper loader.

#### Casts (`laravel/app/Casts/`)

- `MoneyCast.php` — Handle monetary values cleanly with casting.

#### Policies (`laravel/app/Policies/`)

- `ProductPolicy.php` — Example of clean authorization logic for a product model.

#### Service Providers (`laravel/app/Providers/`)

- `AppServiceProvider.php` — Registers custom macros and helpers.
- `bootstrap/macros.php` — Macro autoloading file.

---

### Tests

All macros and utilities come with PHPUnit unit tests:

- `tests/Unit/CollectionMacrosTest.php`
- `tests/Unit/AdvancedCollectionMacrosTest.php`

```bash
php artisan test
# or
vendor/bin/phpunit
```

### How to Use

- Clone the repository.
- Drop specific files into your Laravel app where needed (e.g., Macros into App\Macros, Commands into App\Console\Commands).
- Register macros inside your AppServiceProvider or use the included bootstrap/macros.php autoloader.
- Use the artisan commands like any other built-in Laravel command.

Enjoy a cleaner, faster development workflow!

### Contributions
Pull requests are welcome! Feel free to fork this repository and suggest improvements, additional helpers, or new artisan commands.

### License
This project is open-sourced under the MIT license.
