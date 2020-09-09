<?php


namespace App\Helpers;


class Helper
{
    public static function httpToHttps($url)
    {
        return preg_replace("/^http:/i", "https:", $url);
    }
}
