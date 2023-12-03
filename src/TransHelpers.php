<?php

namespace Codiliateur\TransHelpers;

class TransHelpers
{
    /**
     * Recursive translations
     *
     * @param null|string $key
     * @param array $replaces
     * @param null|string $locale
     * @return mixed
     */
    public static function transRecursive($key, $replaces = [], $locale = null)
    {
        $locale = $locale ?? \App::getLocale();
        $result = trans($key, $replaces, $locale);

        if (is_array($result) && $locale !== \App::getFallbackLocale()) {
            $result = array_replace_recursive(
                trans($key, $replaces, \App::getFallbackLocale()),
                $result
            );
        }

        return $result;
    }
}