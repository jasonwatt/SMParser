<?php
/**
 * Created by PhpStorm.
 * User: z
 * Date: 8/29/2015
 * Time: 2:45 AM
 */

namespace Zanson\SMParser\FileParser;


class Utility
{
    public static function GenerateSafeFileName($string) {
        return strtolower(trim(preg_replace('#\W+#', '_', $string), '_'));
    }
}