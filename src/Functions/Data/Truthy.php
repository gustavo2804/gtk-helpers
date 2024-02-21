<?php

function isTruthy($value) 
{
	if (is_bool($value))
	{
		return $value;
	}

	if (!$value)
	{
		return false;
	}

	if (is_string($value))
	{
		return ($value != "false" && $value != "0");
	}

	return true;
}

function onlyTruthy($value, $toBeFalseArray)
{
	if (!isTruthy($value))
	{
		return false;
	}

	foreach ($toBeFalseArray as $toBeFalse)
	{
		if (isTruthy($toBeFalse))
		{
			return false;
		}
	}

	return true;
}

