
<?php
include "03_connectDB.php";
session_start();

$user = $_SESSION["user"];
$usertype = $_SESSION["usertype"];
$userID=$_SESSION["userID"];

$url = '01_login.php';
if ($usertype != 'cadmin') header('Location:' . $url);

// // getuserID
$sql_update = "UPDATE parcel
SET status = 'in_transit', send_time = NOW()
WHERE status = 'pending' AND delivery_manageruID='$userID' ";
$result=mysqli_query($conn,$sql_update);
if($result){
  $url = '07_cadmin.php';
  header('Location:' . $url);
}

?>