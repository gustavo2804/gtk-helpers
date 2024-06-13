<?php

if (!function_exists('findRootLevel')) 
{
	function findRootLevel()
	{
		$dir = __DIR__;
		while (!file_exists($dir . '/vendor/autoload.php')) {
			$dir = dirname($dir);
			if ($dir === '/') {
				throw new Exception('Failed to find autoload.php. Run Composer install.');
			}
		}
		return $dir;
	}
}

if (!function_exists('findAutoloadFile')) 
{
	function findAutoloadFile() 
	{
		$rootLevel = findRootLevel();
		return $rootLevel.'/vendor/autoload.php';
	}
}

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


function isRootPath($path) {
    // Check if the path starts with "/"
    if (strpos($path, '/') === 0) {
        return true;
    }
    
	/*
    // Check if the path starts with a backslash "\"
    if (strpos($path, '\\') === 0) {
        return true;
    }
	*/
    
    // Check if the path starts with a drive letter (e.g., "C:\", "D:\", etc.)
    if (preg_match('/^[A-Za-z]:[\\\\\/]/', $path)) {
        return true;
    }
    
    return false;
}

// Function to prompt the user to confirm they are not connected to production
function askUserToConfirmThatTheyAreNotOnProduction() {
    echo "Did you check to make sure you are not connected to production? (yes/no): ";
    $handle = fopen("php://stdin", "r");
    $line = trim(fgets($handle));
    
    if (strtolower($line) !== 'yes') {
        echo "Please make sure you are not connected to production. Exiting...\n";
        exit(1);
    }
    
    echo "Proceeding with the script...\n";
}
