<?php

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

$databaseHost = 'localhost';
$databaseName = 'mydb';
$databaseUsername = 'root';
$databasePassword = '';

//function mysqli_connect ($host = '', $user = '', $password = '', $database = '', $port = '', $socket = '')
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>
