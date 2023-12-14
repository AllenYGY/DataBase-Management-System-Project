<?php
include "03_connectDB.php";

$startAddress = $_POST['startadr'];
$endAddress = $_POST['endadr'];
$packageType = $_POST['packagetype'];
$weight = $_POST['weight'];
$volume = $_POST['volume'];
$cust_pick_uID=$_POST['cust_pick_uID'];

session_start();
$user = $_SESSION['user'];
$userID = $_SESSION['userID'];
$usertype=$_SESSION['usertype'];

$sql = "INSERT INTO parcel (volume, weight, location, parceltype, status, cust_send_uID, send_address, send_storage_time,cust_pick_uID)
        VALUES ('$volume', '$weight', '$startAddress', 'others', 'pending', '$userID','$endAddress', NOW(),'$cust_pick_uID')";

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
