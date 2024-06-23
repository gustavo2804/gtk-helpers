<?php

function toSnakeCase(string $str) 
{
    return strtolower(preg_replace('/(.)(?=[A-Z])/','$1_', $str)); 
}
  

// Get the length of the suffix
function stringEndsWith($suffix, $string) 
{
    $suffixLength = strlen($suffix);
    

    if (strlen($string) < $suffixLength) 
    {
        return false;
    }
    

    $endOfStr = substr($string, -$suffixLength);
    

    return strcasecmp($endOfStr, $suffix) === 0;
}


function isNullOrEmpty($str) {
    return (!isset($str) || trim($str) === '');
}
