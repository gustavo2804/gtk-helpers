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

function check_tls_and_cipher($url, $expectedResponse) 
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_CERTINFO, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $cert_info = curl_getinfo($ch, CURLINFO_CERTINFO);
        echo "TLS version: " . curl_getinfo($ch, CURLINFO_SSL_VERSION) . PHP_EOL;
        echo "Cipher Suite: " . curl_getinfo($ch, CURLINFO_SSL_CIPHER) . PHP_EOL;
        
        echo "Certificate Info:" . PHP_EOL;
        foreach ($cert_info as $cert) {
            echo "Subject: " . $cert['Subject'] . PHP_EOL;
            echo "Issuer: " . $cert['Issuer'] . PHP_EOL;
            echo "Expiry: " . $cert['Expire date'] . PHP_EOL;
        }

		echo "Got response: ".$response.PHP_EOL;
    }

    curl_close($ch);

	return $response;
}
