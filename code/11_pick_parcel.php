<?php
include "03_connectDB.php";

session_start();

$user = $_SESSION["user"];
$usertype = $_SESSION["usertype"];
$userID = $_SESSION["userID"];

$packageid = $_POST["packageid"];
$pickpwd = $_POST["pickpwd"];

$sql = "SELECT * FROM parcel WHERE parcelID='$packageid' AND parcel.cust_pick_uID='$userID'";
$result3 = mysqli_query($conn, $sql);
$url = '06_customer.php';


if ($result3 && mysqli_num_rows($result3) > 0) {
  $sql_pick = "UPDATE `parcel`
              SET  `pick_time` = NOW(), status='accept'
              WHERE `parcelID` = '$packageid' AND `cust_pick_uID` = '$userID'";
  $result4 = mysqli_query($conn, $sql_pick);
  if ($result4 > 0) {
    // echo"1111";
    header('Location:' . $url);
  }
} else {
  echo "<script>alert('Package ID not found or does not belong to you.')</script>";
  // header('Location:' . $url);

}
