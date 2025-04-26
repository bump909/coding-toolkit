<?php

if (! function_exists('array_pluck_keys')) {
    /**
     * Extract only the specified keys from an array.
     *
     * @param array $array
     * @param array $keys
     * @return array
     */
    function array_pluck_keys(array $array, array $keys): array
    {
        return array_intersect_key($array, array_flip($keys));
    }
}

if (! function_exists('array_filter_null')) {
    /**
     * Filter out all null values from an array.
     *
     * @param array $array
     * @return array
     */
    function array_filter_null(array $array): array
    {
        return array_filter($array, fn($value) => ! is_null($value));
    }
}

if (! function_exists('array_flatten_once')) {
    /**
     * Flatten an array one level deep.
     *
     * @param array $array
     * @return array
     */
    function array_flatten_once(array $array): array
    {
        return array_merge(...array_values($array));
    }
}

if (! function_exists('array_sort_by_key')) {
    /**
     * Sort an array by a specific key.
     *
     * @param array $array
     * @param string $key
     * @return array
     */
    function array_sort_by_key(array $array, string $key): array
    {
        usort($array, fn($a, $b) => $a[$key] <=> $b[$key]);
        return $array;
    }
}

if (! function_exists('array_sort_by_keys')) {
    /**
     * Sort an array by multiple keys.
     *
     * @param array $array
     * @param array $keys
     * @return array
     */
    function array_sort_by_keys(array $array, array $keys): array
    {
        usort($array, function ($a, $b) use ($keys) {
            foreach ($keys as $key) {
                if ($a[$key] < $b[$key]) {
                    return -1;
                } elseif ($a[$key] > $b[$key]) {
                    return 1;
                }
            }
            return 0;
        });
        return $array;
    }
}

if (! function_exists('array_group_by')) {
    /**
     * Group an array by a specific key.
     *
     * @param array $array
     * @param string $key
     * @return array
     */
    function array_group_by(array $array, string $key): array
    {
        return collect($array)->groupBy($key)->toArray();
    }
}

if (! function_exists('array_unique_multidimensional')) {
    /**
     * Remove duplicate values from a multidimensional array.
     *
     * @param array $array
     * @return array
     */
    function array_unique_multidimensional(array $array): array
    {
        return array_map("unserialize", array_unique(array_map("serialize", $array)));
    }
}

if (! function_exists('array_merge_recursive_distinct')) {
    /**
     * Merge two or more arrays recursively, preserving keys and values.
     *
     * @param array ...$arrays
     * @return array
     */
    function array_merge_recursive_distinct(...$arrays): array
    {
        $merged = [];
        foreach ($arrays as $array) {
            foreach ($array as $key => $value) {
                if (is_array($value) && isset($merged[$key]) && is_array($merged[$key])) {
                    $merged[$key] = array_merge_recursive_distinct($merged[$key], $value);
                } else {
                    $merged[$key] = $value;
                }
            }
        }
        return $merged;
    }
}

if (! function_exists('array_to_object')) {
    /**
     * Convert an array to an object.
     *
     * @param array $array
     * @return object
     */
    function array_to_object(array $array): object
    {
        return json_decode(json_encode($array));
    }
}

if (! function_exists('array_to_json')) {
    /**
     * Convert an array to a JSON string.
     *
     * @param array $array
     * @return string
     */
    function array_to_json(array $array): string
    {
        return json_encode($array);
    }
}

if (! function_exists('array_to_xml')) {
    /**
     * Convert an array to an XML string.
     *
     * @param array $array
     * @param SimpleXMLElement|null $xml
     * @return string
     */
    function array_to_xml(array $array, ?SimpleXMLElement $xml = null): string
    {
        if ($xml === null) {
            $xml = new SimpleXMLElement('<root/>');
        }
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                array_to_xml($value, $xml->addChild($key));
            } else {
                $xml->addChild($key, htmlspecialchars($value));
            }
        }
        return $xml->asXML();
    }
}

if (! function_exists('array_to_csv')) {
    /**
     * Convert an array to a CSV string.
     *
     * @param array $array
     * @return string
     */
    function array_to_csv(array $array): string
    {
        ob_start();
        $output = fopen('php://output', 'w');
        foreach ($array as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
        return ob_get_clean();
    }
}

if (! function_exists('array_to_ini')) {
    /**
     * Convert an array to an INI string.
     *
     * @param array $array
     * @return string
     */
    function array_to_ini(array $array): string
    {
        return parse_ini_string($array);
    }
}

if (! function_exists('array_to_query_string')) {
    /**
     * Convert an array to a query string.
     *
     * @param array $array
     * @return string
     */
    function array_to_query_string(array $array): string
    {
        return http_build_query($array);
    }
}

if (! function_exists('array_to_form_data')) {
    /**
     * Convert an array to form data.
     *
     * @param array $array
     * @return string
     */
    function array_to_form_data(array $array): string
    {
        return http_build_query($array);
    }
}

if (! function_exists('array_to_html')) {
    /**
     * Convert an array to an HTML string.
     *
     * @param array $array
     * @return string
     */
    function array_to_html(array $array): string
    {
        return '<pre>' . htmlspecialchars(print_r($array, true)) . '</pre>';
    }
}

if (! function_exists('array_to_text')) {
    /**
     * Convert an array to a plain text string.
     *
     * @param array $array
     * @return string
     */
    function array_to_text(array $array): string
    {
        return print_r($array, true);
    }
}

if (! function_exists('array_to_markdown')) {
    /**
     * Convert an array to a Markdown string.
     *
     * @param array $array
     * @return string
     */
    function array_to_markdown(array $array): string
    {
        return json_encode($array, JSON_PRETTY_PRINT);
    }
}

if (! function_exists('array_to_sql')) {
    /**
     * Convert an array to a SQL string.
     *
     * @param array $array
     * @return string
     */
    function array_to_sql(array $array): string
    {
        return implode(', ', array_map(fn($key, $value) => "$key = '$value'", array_keys($array), $array));
    }
}

if (! function_exists('array_to_php')) {
    /**
     * Convert an array to a PHP string.
     *
     * @param array $array
     * @return string
     */
    function array_to_php(array $array): string
    {
        return var_export($array, true);
    }
}

if (! function_exists('array_to_js')) {
    /**
     * Convert an array to a JavaScript string.
     *
     * @param array $array
     * @return string
     */
    function array_to_js(array $array): string
    {
        return json_encode($array);
    }
}
