<?php
include "03_connectDB.php";

// 假设这些值是通过表单 POST 方法传递过来的
$startAddress = $_POST['startadr'];
$endAddress = $_POST['endadr'];
$packageType = $_POST['packagetype'];
$weight = $_POST['weight'];
$volume = $_POST['volume'];
// $volumeType = $_POST['volumetype'];

session_start();
$user = $_SESSION['user'];
$userID = $_SESSION['userID'];
$usertype=$_SESSION['usertype'];

$sql = "INSERT INTO parcel (volume, weight, location, parceltype, status, cust_send_uID, send_address, send_storage_time)
        VALUES ('$volume', '$weight', '$startAddress', 'others', 'pending', '$userID','$endAddress', NOW())";

if (mysqli_query($conn, $sql)) {
  echo "Data inserted successfully.";
 
  if ($usertype == "customer") {
    $url = "06_customer.php";
  }
  if ($usertype == "cadmin")
    $url = "07_cadmin.php";
  if ($usertype == "admin") {
    $url = "08_admin.php";
  }

  header('Location:' . $url);
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
