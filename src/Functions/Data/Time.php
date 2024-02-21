<?php 
    
function generateTimeToSecondsNumber() 
{
	$currentDate = new DateTime();
	$year        = substr($currentDate->format('Y'), -2);
	$month       = str_pad($currentDate->format('m'), 2, '0', STR_PAD_LEFT);
	$day         = str_pad($currentDate->format('d'), 2, '0', STR_PAD_LEFT);
	$hours       = str_pad($currentDate->format('H'), 2, '0', STR_PAD_LEFT);
	$minutes     = str_pad($currentDate->format('i'), 2, '0', STR_PAD_LEFT);
	$seconds     = str_pad($currentDate->format('s'), 2, '0', STR_PAD_LEFT);
	
	return intval($year . $month . $day . $hours . $minutes);
}

function generateTimeBasedID() 
{
    $currentDate = new DateTime();
    
    $yearLastDigit = substr($currentDate->format('Y'), -1);
    $dayOfYear = str_pad($currentDate->format('z'), 2, '0', STR_PAD_LEFT); // Day of the year (0 to 365)
    $hourMinute = $currentDate->format('Hi'); // Hour and minute

    // Creating a base36 (0-9, a-z) representation of seconds to occupy 2 characters
    $second = base_convert($currentDate->format('s'), 10, 36);

    return strtoupper($yearLastDigit . $dayOfYear . $hourMinute . $second);
}

function generateMicroTimeUUID() 
{
	$microTime = microtime(true);
	$microSeconds = sprintf("%06d", ($microTime - floor($microTime)) * 1e6);
	$time = new DateTime(date('Y-m-d H:i:s.' . $microSeconds, $microTime));
	$time = $time->format("YmdHisu"); // Format time to a string with microseconds
	return md5($time); // You can also use sha1 or any other algorithm
}   

function nextGTKContainerNumber() 
{
	// return 'GTK++' . generateTimeBasedID();
	return 'GTK++' . generateMicroTimeUUID();
}
