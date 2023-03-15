<?php

$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "password";
$dbName = "phpproject01";

$conn = mysql_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}