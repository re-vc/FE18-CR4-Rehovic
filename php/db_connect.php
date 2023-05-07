<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "be18_cr4_rehovic_biglibrary"; //replace with database name
$connect = mysqli_connect($hostName, $userName, $password, $dbName);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
