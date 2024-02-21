<?php

function isDictionary($array) {
    return (bool)count(array_filter(array_keys($array), 'is_string'));
}

function parseCSVLine($inputString) {
	if (!$inputString)
	{
		return [];
	}

	if ($inputString === '')
	{
		return [];
	}
	
    // Split the input string into an array using commas as the delimiter
    $array = explode(',', $inputString);

    // Trim each element to remove leading/trailing whitespace
    $array = array_map('trim', $array);

    // Remove empty elements from the array
    $array = array_filter($array);

    return $array;
}


function appendToCSVString($inputString, $toAppend)
{
	$array = parseCSVLine($inputString);

	array_push($array, $toAppend);

	$csvLine = implode(",", $array);

	return $csvLine;
}

function segregateArrayKeysWithPrefix($prefix, $toSegregate)
{
	$withPrefix = array();
    $withoutPrefix = array();

    foreach ($toSegregate as $key => $value) {
        if (strpos($key, $prefix) === 0) {
            $withPrefix[$key] = $value;
        } else {
            $withoutPrefix[$key] = $value;
        }
    }

    return array($withPrefix, $withoutPrefix);
}

function useFirstArrayToSetKey($fileKey, $arrays, $defaultValue)
{
	foreach ($arrays as $array)
	{
		if (isset($array[$fileKey]))
		{
			return $array[$fileKey];
		}
	}
	
	return $defaultValue;
}

function arrayValueIfExistsA($array, $key, $options = null)
{
	return arrayValueIfExists($key, $array, $options);
}

function arrayValueIfExists($key, $array, $options = null)
{
	$debug = false;

	$toReturn = null;

	if ($debug)
	{
		error_log("On `arrayValueIfExists`");
	}
	
	if (is_array($array) && array_key_exists($key, $array) && $array[$key])
	{
		if ($debug)
		{
			error_log("Looking for key: ($key) in array of count: ".count($array));
			// error_log("Looking for key: ($key) in array: ".serialize($array));
		}
		$toReturn = $array[$key];
	}
	
	if (!$toReturn && is_array($options) && array_key_exists("default", $options))
	{
		$toReturn = $options["default"];
		if ($debug)
		{ 
			if (is_callable($toReturn))
			{
				error_log("Got callable default. Can't print.");
			}
			else
			{
				error_log("Got non-callable default: ".$toReturn);
			}
			
		}
		
	}
	
	if ($toReturn && is_array($options) && array_key_exists("transformer", $options))
	{
		$transformer = $options["transformer"];
		$toReturn = $transformer($toReturn);
	}
	
	return $toReturn;
}


function arrayContainsAnyKey ($array, $keys) {
	foreach ($keys as $key)
	{
		if (array_key_exists($key, $array))
		{
			return true;
		}
	}
	return false;
	//    return false; // failure, if any key doesn't exist
	// return true; // else true; it hasn't failed yet
}



function ensureRequiredValuesSetInArray($form_vars, $required_vars, $validation_closures = array(), $throwResult = 1) 
{
	$exceptionsToAnnnounce = array();
	
	error_log("Form vars: ".serialize($form_vars));
	error_log("Required vars: ".serialize($required_vars));
	
	foreach ($required_vars as $required)
	{
		$value = $form_vars[$required];
		
		if (!array_key_exists($required, $form_vars) || ($value === ""))
		{
			array_push($exceptionsToAnnnounce, "Le falta introducir un valor para `{$required}`,");
		}
	}
	
	/*
	foreach($form_vars as $key => $value)
	{
		error_log("Checking key: {$key}");
		
		if (array_key_exists($key, $required_vars))
		{
			
			if ($value == '') 
			{
				array_push($exceptionsToAnnnounce, "Le falta introducir un valor para `{$key}`,");
			}
		}
		
		if (array_key_exists($key, $validation_closures))
		{
			$closure = $validation_closures['key'];
			
			if (!$closure($value))
			{
				return false; // Could accumulate problems....
			}
		}
	}
	*/
	
	error_log("Exceptions: ".serialize($exceptionsToAnnnounce));


	
	if (array_count_values($exceptionsToAnnnounce))
	{
		$message = '';
		foreach ($exceptionsToAnnnounce as $exMessage)
		{
			$message = $message.$exMessage."<br/>"; 
		}


		if ($throwResult == 0)
		{
			return $exceptionsToAnnnounce;
		}
		else
		{
			throw new Exception($message);
		}
	}	
	

	return true;
}






