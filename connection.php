<?php

   $databaseHost = 'localhost';
   $databaseName = 'mydb';
   $databaseUsername = 'root';
   $databasePassword = '';

   //function mysqli_connect ($host = '', $user = '', $password = '', $database = '', $port = '', $socket = '')
   $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

   ?>
