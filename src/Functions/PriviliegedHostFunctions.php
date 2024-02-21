<?php


function isPrivilegedHost() 
{

    global $_GLOBAL;

    static $didTry = false;
    static $privilegedHosts = [];

    if (!$didTry)
    {
        global $_GLOBALS;
        if (isset($_GLOBALS["PRIVILIGED_HOSTS"]))
        {
            $privilegedHosts = $_GLOBALS["PRIVILIGED_HOSTS"];
        }
        $didTry = true;
    }

	$httpHost = $_SERVER["HTTP_HOST"];

    return in_array($httpHost, $privilegedHosts);
}
