<?php

$hostName = "localhost";
$dbUser = "root";
$dbNric = "";
$dbName = "etcs_database";
$conn = mysqli_connect($hostName, $dbUser, $dbNric, $dbName);
if (!$conn) {
  die("Something went wrong");
}
