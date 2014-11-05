<?php

namespace app\models;

class Util
{
    /**
     *
     * @param string $filename
     * @return string
     */
    public static function formatFileName($filename) {
        return str_replace(' ', '_', $filename);
    }
}