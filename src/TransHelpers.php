<?php

namespace Codiliateur\TransHelpers;

class TransHelpers
{
    /**
     * Recursive translations
     *
     * @param $key
     * @param $replaces
     * @param $locale
     * @return mixed
     */
    public function transRecursive($key, $replaces = [], $locale = null)
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