<?php

function sanitizeRNC($rnc) {
	return preg_replace('~\D~', '', $rnc);
}

function verifyRNC($rnc) {
	return is_numeric($rnc);
}

function presentRNC($rnc) {
	return sanitizeRNC($rnc);	
}


function verifyCedula($cedula) {
	$santiziedCedula = sanitizeCedula($cedula);
	
	if (!is_numeric($santiziedCedula))
	{
		return false;
	}

	if  (strlen($santiziedCedula) != 11)
	{
		return false;
	}

	return true;
}

function sanitizeCedula($cedula) {
	if ($cedula)
	{
		return preg_replace('~\D~', '', $cedula);
	}
	else
	{
		return null;
	}
	
}

function presentCedula($cedula) {
	$santiziedCedula = sanitizeCedula($cedula);
	$part1 = substr($santiziedCedula, 0, 3);
	$part2 = substr($santiziedCedula, 3, 7);
	$part3 = substr($santiziedCedula, 10, 1);

	return "{$part1}-{$part2}-{$part3}";
}

function checkIfUserCedulaIsInGlobalsArray($arrayName, $user)
{
    $debug = 0;

    if (!$user)
    {
        
        if (DataAccessManager::get("session")->getCurrentUser())
        {
            $user = DataAccessManager::get("session")->getCurrentUser();
        }
        else
        {
            return false;
        }
    }

    global $_GLOBALS;

    if (!isset($_GLOBALS[$arrayName]))
    {
        return false;
    }
    
    $array = $_GLOBALS[$arrayName];

    if (!$array)
    {
        return false;
    }
    
    $value = in_array(sanitizeCedula($user["cedula"]), $array);

    if ($debug)
    {
        error_log("Is $arrayName? ".serialize($value)." - User: ".serialize($user));
    }
    

    return $value;
}
