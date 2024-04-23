<?php
$dbHost = ''; // Your database host
$dbUsername = ''; // Your database username
$dbPassword = ''; // Your database password
$dbName = ''; // Your database name

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully";
?>