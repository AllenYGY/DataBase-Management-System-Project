<?php
include "03_connectDB.php";


$province = $_POST['provinceSelect'];
$city = $_POST['citySelect'];
$district = $_POST['districtSelect'];

$endprovince = $_POST['endprovinceSelect'];
$endcity = $_POST['endcitySelect'];
$enddistrict = $_POST['enddistrictSelect'];

$packageType = $_POST['packagetype'];
$weight = $_POST['weight'];
$volume = $_POST['volume'];
$cust_pick_uID=$_POST['cust_pick_uID'];

$spAddress = $_POST['spadr'];

$startadr = $district . ', ' . $city . ', ' . $province;
$endadr = $enddistrict . ', ' . $endcity . ', ' . $endprovince;

$sql_startcsID="SELECT * FROM courier_station WHERE csaddress='$startadr'";
$sql_endcsID="SELECT * FROM courier_station WHERE csaddress='$endadr'";


$url = "06_customer.php";
$result=mysqli_query($conn, $sql_startcsID);

if ($result) {
  $row = mysqli_fetch_assoc($result);
  $startcsID = $row["csID"];
} else {
  echo"<script>alert('Courier Station Not Found!')</script>";
  header('Location:' . $url);
}

$result=mysqli_query($conn, $sql_endcsID);

if ($result) {
  $row = mysqli_fetch_assoc($result);
  $endcsID = $row["csID"];
} else {
  echo"<script>alert('Courier Station Not Found!')</script>";
  header('Location:' . $url);
}


session_start();
// $user = $_SESSION['user'];
$uID = $_SESSION['uID'];


$sql = "INSERT INTO parcel 
        (volume, weight, parceltype, status, cust_send_uID, send_address, send_storage_time,cust_pick_uID,send_csID,pick_csID)
        VALUES 
        ('$volume', '$weight',  'others', 'pending', '$uID','$spAddress', NOW(),'$cust_pick_uID','$startcsID','$endcsID')";

if (mysqli_query($conn, $sql)) {
  echo "Data inserted successfully.";
  header('Location:' . $url);
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
