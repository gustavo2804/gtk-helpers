<?php

$resource = fopen('php://temp', 'r');
$closure = function() {
    return "Hello, world!";
};
$largeArray = range(1, 10000);
$binaryData = "\x00\x01\x02\x03\x04\x05";

// Using var_dump
echo "Using var_dump:\n";
var_dump($resource);
var_dump($closure);
// var_dump($largeArray);
var_dump($binaryData);

// Using var_export
echo "\nUsing var_export:\n";
var_export($resource);
echo "\n";
var_export($closure);
echo "\n";
// var_export($largeArray);
echo "\n";
// var_export($binaryData);
echo "\n";


try {
    $pdo = new PDO('sqlite::memory:');
    print_r($pdo);
    var_dump($pdo);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
