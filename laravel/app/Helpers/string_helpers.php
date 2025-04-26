<?php

/**
 * Convert a string to title case with spaces instead of underscores
 *
 * @param string $v
 *
 * @return void
 */
function snakeToTitle($v)
{
    return Str::of($v)->snake()->replace('_', ' ')->title();
}


/**
 * Convert a string to a slug, make lowercase with a custom separator and remove special characters
 *
 * @param string $v
 * @param string $separator
 *
 * @return void
 */
function slugify($v, $separator = '-')
{
    // Remove special characters
    $v = preg_replace('/[^A-Za-z0-9\-]/', '', $v);

    // Convert to slug
    return Str::of($v)->slug($separator)->lower()->toString();
}

function getInitials($name)
{
    $words = explode(' ', $name);

    if (count($words) > 2) {
        // Return first and last initials
        return strtoupper($words[0][0]) . strtoupper($words[count($words) - 1][0]);
    }

    // Return initials for names with 2 or fewer words
    return implode('', array_map(function ($word) {
        return strtoupper($word[0]);
    }, $words));
}

if (! function_exists('str_contains')) {
    /**
     * Check if a string contains a substring.
     *
     * @param string $string
     * @param string $substring
     * @return bool
     */
    function str_contains(string $string, string $substring): bool
    {
        return strpos($string, $substring) !== false;
    }
}

if (! function_exists('str_ends_with')) {
    /**
     * Check if a string ends with a substring.
     *
     * @param string $string
     * @param string $substring
     * @return bool
     */
    function str_ends_with(string $string, string $substring): bool
    {
        return substr($string, -strlen($substring)) === $substring;
    }
}

if (! function_exists('str_starts_with')) {
    /**
     * Check if a string starts with a substring.
     *
     * @param string $string
     * @param string $substring
     * @return bool
     */
    function str_starts_with(string $string, string $substring): bool
    {
        return strpos($string, $substring) === 0;
    }
}

if (! function_exists('str_starts_with_vowel')) {
    /**
     * Check if a string starts with a vowel.
     *
     * @param string $string
     * @return bool
     */
    function str_starts_with_vowel(string $string): bool
    {
        return preg_match('/^[aeiou]/i', $string) === 1;
    }
}

if (! function_exists('str_limit_words')) {
    /**
     * Limit a string by a number of words.
     *
     * @param string $string
     * @param int $words
     * @param string $suffix
     * @return string
     */
    function str_limit_words(string $string, int $words = 10, string $suffix = '...'): string
    {
        $wordArray = preg_split('/\s+/', trim($string));
        if (count($wordArray) <= $words) {
            return $string;
        }
        return implode(' ', array_slice($wordArray, 0, $words)) . $suffix;
    }
}

if (! function_exists('str_obfuscate_email')) {
    /**
     * Obfuscate part of an email address.
     *
     * @param string $email
     * @return string
     */
    function str_obfuscate_email(string $email): string
    {
        return preg_replace('/(.{2})(.*)(@.*)/', '$1***$3', $email);
    }
}

if (! function_exists('str_is_valid_email')) {
    /**
     * Check if a string is a valid email address.
     *
     * @param string $email
     * @return bool
     */
    function str_is_valid_email(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}

if (! function_exists('str_is_valid_url')) {
    /**
     * Check if a string is a valid URL.
     *
     * @param string $url
     * @return bool
     */
    function str_is_valid_url(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}

if (! function_exists('str_is_valid_phone')) {
    /**
     * Check if a string is a valid phone number.
     *
     * @param string $phone
     * @return bool
     */
    function str_is_valid_phone(string $phone): bool
    {
        return preg_match('/^\+?[0-9\s\-()]+$/', $phone) === 1;
    }
}

if (! function_exists('str_is_valid_ip')) {
    /**
     * Check if a string is a valid IP address.
     *
     * @param string $ip
     * @return bool
     */
    function str_is_valid_ip(string $ip): bool
    {
        return filter_var($ip, FILTER_VALIDATE_IP) !== false;
    }
}

if (! function_exists('str_is_valid_json')) {
    /**
     * Check if a string is valid JSON.
     *
     * @param string $json
     * @return bool
     */
    function str_is_valid_json(string $json): bool
    {
        json_decode($json);
        return (json_last_error() === JSON_ERROR_NONE);
    }
}

if (! function_exists('str_is_valid_base64')) {
    /**
     * Check if a string is valid Base64.
     *
     * @param string $base64
     * @return bool
     */
    function str_is_valid_base64(string $base64): bool
    {
        return (base64_encode(base64_decode($base64, true)) === $base64);
    }
}
if (! function_exists('str_is_valid_uuid')) {
    /**
     * Check if a string is a valid UUID.
     *
     * @param string $uuid
     * @return bool
     */
    function str_is_valid_uuid(string $uuid): bool
    {
        return preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i', $uuid) === 1;
    }
}

if (! function_exists('str_is_valid_slug')) {
    /**
     * Check if a string is a valid slug.
     *
     * @param string $slug
     * @return bool
     */
    function str_is_valid_slug(string $slug): bool
    {
        return preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slug) === 1;
    }
}
