<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MoneyFormatting;

class MoneyCast implements CastsAttributes
{
    use MoneyFormatting;

    private $currency_intl = 'en_GB';
    private $currency = 'GBP';

    /**
     * Cast the given value to decimal.
     * https://www.moneyphp.org/en/stable/features/formatting.html#decimal-formatter
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value === null ? 0 : $this->formatMoney($value); // if $value = 100, return = 1.00
    }

    /**
     * Prepare the given value for storage.
     * https://www.moneyphp.org/en/stable/features/parsing.html
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if ($value === null) {
            return 0;
        }

        $money = $this->parseMoney($value); // if $value = 1.00 ...

        return $money->getAmount(); // ... return = 100
    }
}
