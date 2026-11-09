<?php

// Get the host name (e.g. localhost or lrgs.ftsm.ukm.my)
$host = $_SERVER['HTTP_HOST'];  

// Get the current script path (e.g. /week7lab/index.php)
$scriptPath = $_SERVER['SCRIPT_NAME'];  

// Get only the file name from the script (e.g. index.php)
$fileName = basename($scriptPath);  

// Remove the file name from the script path (e.g. /week7lab/)
$directoryPath = str_replace($fileName, "", $scriptPath);  

// Combine everything into a full base URL
$baseUrl = "http://" . $host . $directoryPath;  

// Define it as a constant so you can use BASE_URL anywhere
define('BASE_URL', $baseUrl);

?>