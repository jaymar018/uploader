<?php

namespace App\Helpers;

class FilePathHelper 
{
    private static $filePath;

    public static function setFilePath($path)
    {
        self::$filePath = $path;
    }

    public static function getFilePath()
    {
        return self::$filePath;
    }

}