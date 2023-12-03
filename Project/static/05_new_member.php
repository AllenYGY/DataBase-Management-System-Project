<?php

include "03_connectDB.php";

$user  = $_POST["usr"];
$pwd1  = $_POST["pwd1"];
$pwd2  = $_POST["pwd2"];
$usertype = $_POST["usrtype"];

if ($pwd1 != $pwd2) {
	echo "Passwords do not match. Please retype identical passwords in both boxes.<br>";
	echo "<br>Go to <a href='02_register.php'>Regisration Page </a>";
} else {
	$sql = "SELECT username FROM user WHERE username = '$user'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		echo  $user . " has been registered!";
		echo "<br><hr><br> Go back to <a href='02_register.php'>Regisration</a>";
	} else {
		$sql2 = "INSERT INTO `user` (`username`, `password`,`usertype`) VALUES ('$user', '$pwd1','$usertype')";
		$result2 = mysqli_query($conn, $sql2);
		echo "You have been registered successfully! <br> Welcome " . $user . "!<br>";
		echo "<br><a href='01_login.php'>Go to Login!</a>";
		$url = "01_login.php";
		header('Location:' . $url);
	}
}
