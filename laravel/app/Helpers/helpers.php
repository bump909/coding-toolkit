<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

/**
 * Temporarily store the DB Setting table row data for 15 minutes
 *
 * @param array|string $key (optional) the column name to retrieve
 * @return void
 */
if (! function_exists('getSetting')) {
    function getSetting(string $key, $default = null)
    {
        return Cache::remember("setting_{$key}", 15 * 60, function () use ($key, $default) {
            $setting = \App\Models\Setting::where('key', $key)->first();

            return $setting ? $setting->value : $default;
        });
    }
}
