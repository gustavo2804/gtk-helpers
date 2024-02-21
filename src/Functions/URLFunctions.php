<?php

function getProtocol() {
	$protocol = 0;

	if (isWindows()) 
	{
		$protocol = 'http://';
	}
	else
	{
		$protocol = 'https://';
	}

	return $protocol;
}

function urlForPath($path) {

	if (substr($path, 0, 1) === '/') 
	{
		return getProtocol().$_SERVER['HTTP_HOST'].$path;
	} 
	else 
	{
		return getProtocol().$_SERVER['HTTP_HOST'].'/'.$path;
	}
	
}

function redirectToURL($url, $message)
{
	header('Location: ' . $url.'?message='.urldecode($message), true, 301);
	exit();
}

function redirectToPath($path, $message)
{
	$url = getProtocol().$_SERVER['HTTP_HOST'].$path;
	redirectToURL($url, $message);
}
