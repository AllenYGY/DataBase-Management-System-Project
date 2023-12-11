<?php
include "03_connectDB.php";
session_start();
$user = $_SESSION["user"];
$usertype = $_SESSION["usertype"];
$url = '01_login.php';
if ($usertype != 'cadmin') header('Location:' . $url);

