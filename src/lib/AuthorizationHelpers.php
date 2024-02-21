<?php


function echoIfRole($user, $role, $content)
{
	if (isRole($user, $role))
	{
		echo $content;
	}
}

function gateIfNotRole($role, $user = null)
{
	$debug = false;
	
	if (!$user)
	{
		
		$user = DataAccessManager::get("session")->getCurrentUser();
		error_log("No user passed to `gateIfNotRole`, using current user: ".serialize($user));
	}

	if ($debug) { error_log("Checking if user is role: ".$role." -- User: ".serialize($user)); }


	if (!isRole($user, $role))
	{
		echo '<h1>No esta autorizado</h1>';
		die();
	}
}

function isRole($user, $role)
{
	$userIsDev = DataAccessManager::get("persona")->isDeveloper($user);

	if ($userIsDev)
	{
		return true;
	}

	if ($role == "admin")
	{
		if (DataAccessManager::get("persona")->isAdmin($user))
		{
			return true;
		}
	}
	
	if ($role == "admin")
	{
		if (DataAccessManager::get("persona")->isAdmin($user))
		{
			return true;
		}
	}



	/*
	if ($role == "chofer")
	{
		if (DataAccessManager::get("persona")->isChofer($user))
		{
			echo $content;
		}
	}
	*/


	return false;
}
