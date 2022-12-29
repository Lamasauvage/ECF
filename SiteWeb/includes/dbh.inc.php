<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "ecf";

$conn = ($serverName, $dBUsername, $dBPassword, $dBName);

if (!conn) {
  die("Connection failed: " . mysq);
}