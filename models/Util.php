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

    /**
     * Converts timestamp to specific format
     * @param int $timestamp
     * @return int
     */
    public static function formatDate($timestamp) {
        return strftime('%d %b %G %H:%M', $timestamp);
    }
}