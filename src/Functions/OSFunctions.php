<?php

if (!function_exists("isWindows"))
{
    function isWindows() 
    {
        if (strcasecmp(substr(PHP_OS, 0, 3), 'WIN') == 0)
        {
            return true;
        }

        return false;
    }
}
