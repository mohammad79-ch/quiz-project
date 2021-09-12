<?php

if (!function_exists('shorter')) {

    function shorter($text, $length): string
    {
        if (strlen($text) > $length) {
            $new_text = mb_substr($text, 0, $length);
            $new_text = trim($new_text);
            return $new_text . "...";
        }
        return $text;
    }
}
