
<?php
include "03_connectDB.php";
session_start();
$user = $_SESSION["user"];
$usertype = $_SESSION["usertype"];
$userID=$_SESSION["userID"];

$url = '01_login.php';
if ($usertype != 'cadmin') header('Location:' . $url);

// getuserID
$sql_getusrID = "SELECT user.uID FROM user WHERE uname='$user'";

$result = mysqli_query($conn, $sql_getusrID);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $usrID = $row['uID'];
}


$sql_update = "UPDATE parcel
SET status = 'in_transit', send_time = NOW()
WHERE status = 'pending' AND delivery_manageruID='$usrID' ";
$result=mysqli_query($conn,$sql_update);
if($result){
  $url = '07_cadmin.php';
  header('Location:' . $url);
}

?>
