<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "BE18_CR4_Rehovic_BigLibrary"; //replace with database name
$connect = mysqli_connect($hostName, $userName, $password, $dbName);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
