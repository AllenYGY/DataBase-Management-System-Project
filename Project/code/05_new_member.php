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
	$sql = "SELECT uname FROM customer WHERE uname = '$user'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		echo  $user . " has been registered!";
		echo "<br><hr><br> Go back to <a href='02_register.php'>Regisration</a>";
	} else {
		$usr_pic="SELECT upicture FROM customer WHERE uID=73";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$upicture = $row["upicture"];
		}
		$sql = "INSERT INTO `customer` (`uname`, `upassword`,`upicture`) VALUES ('$user', '$pwd1','$upicture')";
		$result = mysqli_query($conn, $sql);
		echo "You have been registered successfully! <br> Welcome " . $user . "!<br>";
		$sql = "SELECT * FROM customer WHERE uname='$user'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$uID = $row["uID"];
		}
		echo "Your userID is $uID";
		echo "<br><a href='01_login.php'>Go to Login!</a>";
		// $url = "01_login.php";
		// header('Location:' . $url);
	}
}
