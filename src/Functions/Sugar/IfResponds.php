<?php

function ifResponds0($object, $method) {
	$debug = false;
	if (method_exists($object, $method)) {
		if ($debug)
		{
			error_log("Responds to method: {$method}");
		}
		return $object->$method();
	}
	if ($debug)
	{
		error_log("Does not respond to method: {$method}");
	}
}

function ifResponds1($object, $method, $arg1) {
	$debug = false;
	if (method_exists($object, $method)) {
		if ($debug)
		{
			error_log("Responds to method: {$method}");
		}
		return $object->$method($arg1);
	}

	if ($debug)
	{
		error_log("Does not respond to method: {$method}");
	}
}

function ifResponds2($object, $method, $arg1, $arg2) {
	$debug = false;
	
	if (method_exists($object, $method)) {
		if ($debug)
		{
			error_log("Responds to method: {$method}");
		}
		return $object->$method($arg1, $arg2);
	}

	if ($debug)
	{
		error_log("Does not respond to method: {$method}");
	}
}

function ifResponds3($object, $method, $arg1, $arg2, $arg3) {
	$debug = false;
	
	if (method_exists($object, $method)) {
		if ($debug)
		{
			error_log("Responds to method: {$method}");
		}
		return $object->$method($arg1, $arg2, $arg3);
	}

	if ($debug)
	{
		error_log("Does not respond to method: {$method}");
	}
}

function ifResponds4($object, $method, $arg1, $arg2, $arg3) {
	$debug = false;
	
	if (method_exists($object, $method)) {
		if ($debug)
		{
			error_log("Responds to method: {$method}");
		}
		return $object->$method($arg1, $arg2, $arg3, $arg4);
	}

	if ($debug)
	{
		error_log("Does not respond to method: {$method}");
	}
}
