# Laravel Toolkit

This toolkit includes **custom macros**, **artisan commands**, **helpers**, **casts** and **policies**, all designed to be plug-and-play into any Laravel project.

## Artisan Commands 

`laravel/app/Console/Commands/`

- `ClearLogFile.php` — Instantly clear your Laravel log file.
- `GenerateSitemap.php` — Create dynamic sitemaps.
- `RemoveInactiveGuestCarts.php` — Clean up abandoned shopping carts.
- `SendTestMailCommand.php` — Quickly send test emails.
- `TestQueueCommand.php` — Dispatch test jobs onto queues.

## Collection Macros 
`laravel/app/Macros/Collections/`

Reusable, smart Laravel Collection macros:

- `ChunkByConditionMacro.php` — Chunk a collection dynamically based on conditions.
- `GroupByFirstLetterMacro.php` — Group items by their starting letter.
- `RandomGroupsMacro.php` — Split collections into random groups.
- `ToAssocArrayMacro.php` — Quickly map collections into key/value arrays.

See full [Collection Macros README](laravel/app/Macros/Collections/README.md).

## Helpers
`laravel/app/Helpers/`

Global PHP functions to speed up day-to-day coding:

- `array_helpers.php` — Useful array utilities.
- `string_helpers.php` — Helpful string manipulation functions.
- `helpers.php` — Centralized helper loader.

## Casts
`laravel/app/Casts/`

- `MoneyCast.php` — Handle monetary values cleanly with casting.

## Policies
`laravel/app/Policies/`

- `ProductPolicy.php` — Example of clean authorization logic for a product model.

## Service Providers
`laravel/app/Providers/`

- `AppServiceProvider.php` — Registers custom macros and helpers.
- `bootstrap/macros.php` — Macro autoloading file.
