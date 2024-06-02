<?php

class Autoloader
{
    public static function loadClassesFromFolder($folderPath): void
    {
        $files = scandir($folderPath);

        foreach ($files as $file) {
            if (is_file($folderPath . $file) && $file != '.' && $file != '..') {
                require_once $folderPath . $file;
            }
        }
    }
}