<?php

use Codiliateur\TransHelpers\TransHelpers;

if (! function_exists('trans_r')) {
    /**
     * Translate recursive
     *
     * @param null|string $key
     * @param array $replaces
     * @param null|string $locale
     * @return mixed
     */
    function trans_r($key, $replaces = [], $locale = null)
    {
        return TransHelpers::transRecursive($key, $replaces, $locale);
    }
}
