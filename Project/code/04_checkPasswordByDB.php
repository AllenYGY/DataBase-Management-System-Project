<?php

include "03_connectDB.php";

$user	= $_POST["usr"];
$pwd	= $_POST["pwd"];
$usertype = $_POST["usrtype"];

$sql = "SELECT username, password FROM user WHERE username = '$user' AND password = '$pwd' AND usertype='$usertype'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	if ($usertype == "customer") {
		$url = "06_customer.php";
	}
	if ($usertype == "cadmin")
		$url = "07_cadmin.php";
	if ($usertype == "admin") {
		$url = "08_admin.php";
	}
	session_start();
	// 在登录时将 $user 存储在 $_SESSION 中
	$_SESSION["user"] = $user;
	$_SESSION["usertype"] = $usertype;

	header('Location:' . $url);
} else {
	echo "Opps! Your username or password or usertype is wrong!";
	echo "<br><hr><br> Go back to <a href='01_login.php'>Login!</a>";
}
