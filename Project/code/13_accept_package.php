
<?php
include "03_connectDB.php";
session_start();
$user = $_SESSION["user"];
$usertype = $_SESSION["usertype"];
$uID = $_SESSION["uID"];
$csID = $_SESSION["csID"];
$csadr = $_SESSION["csadr"];

echo $csadr;

$url = '01_login.php';
if ($usertype != 'cadmin') header('Location:' . $url);


$sql_update = "UPDATE parcel
SET status = 'delivered', pick_storage_time = NOW()
WHERE status = 'in_transit' AND pick_csID='$csID' ";

$result = mysqli_query($conn, $sql_update);
if ($result) {
  $url = '07_cadmin.php';
  header('Location:' . $url);
}

?>
