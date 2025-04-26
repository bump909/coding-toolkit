# Coding Toolkit for Laravel, PHP & MySQL

[![PHP Version](https://img.shields.io/badge/PHP-8.3-blue.svg)](https://www.php.net/)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

A carefully crafted collection of Laravel and PHP utilities, raw MySQL patterns and PHP unit tests to speed up your development workflows, demonstrate best practices, and build smarter applications.

---

## What's Inside the Toolkits

- **Laravel Utilities** – Handy helpers, macros, and artisan commands. [View »](./laravel/README.md)
- **MySQL Patterns** – Raw SQL examples showing efficient querying techniques. [View »](./mysql-patterns/README.md)
- **PHP Unit Tests** – Coverage for helper functions, macros, utilities and patterns. [View »](./tests)

## How to Use

- Clone the repository.
- Drop specific files into your Laravel app where needed (e.g., Macros into App\Macros, Commands into App\Console\Commands).
- Register macros inside your AppServiceProvider or use the included bootstrap/macros.php autoloader.
- Use the artisan commands like any other built-in Laravel command.

Enjoy a cleaner, faster development workflow!

## Testing

All macros and utilities come with PHPUnit unit tests:

```bash
composer test
# or
vendor/bin/phpunit tests/[Filename]
```

### Contributions

Feel free to fork this repository and suggest improvements, additional helpers, or new artisan commands.

### License

This project is open-sourced under the MIT license.
