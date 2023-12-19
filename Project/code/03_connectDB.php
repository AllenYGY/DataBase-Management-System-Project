<?php

$servername = "localhost"; // if use uic server, change to db.bcrab.cn
$username     = "root";       // change to your account
$password     = "";      // change to your account
$db            = "project";      // change to your database name
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}