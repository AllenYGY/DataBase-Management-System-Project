<?php

include "03_connectDB.php";

$user	= $_POST["usr"];
$pwd	= $_POST["pwd"];
$utype = $_POST["usrtype"];

if ($utype == "customer") {
	$sql = "SELECT * FROM customer WHERE uID = '$user' AND upassword = '$pwd';";
}
if ($utype == "cadmin")
	$sql = "SELECT * FROM cadmin WHERE uID = '$user' AND upassword = '$pwd';";
if ($utype == "admin") {
	$sql = "SELECT * FROM admin WHERE uID = '$user' AND upassword = '$pwd';";
}


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	if ($utype == "customer") {
		$url = "06_customer.php";
	}
	if ($utype == "cadmin")
		$url = "07_cadmin.php";
	if ($utype == "admin") {
		$url = "08_admin.php";
	}
	session_start();
	$_SESSION["uID"] = $user;
	$_SESSION["usertype"] = $utype;
	$_SESSION["flag"]=0;
	header('Location:' . $url);
} else {
	$url = "error.html";
	header('Location:' . $url);
	echo "<br><hr><br> Go back to <a href='01_login.php'>Login!</a>";
	$url = "01_login.php";
	header('Location:' . $url);
}
