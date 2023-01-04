<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "password";
$dBName = "db1";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName, 3308);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected (msg à delete après)";