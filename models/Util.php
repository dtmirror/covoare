<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

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