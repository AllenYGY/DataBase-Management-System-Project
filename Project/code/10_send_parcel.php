<?php
include "03_connectDB.php";

// 假设这些值是通过表单 POST 方法传递过来的
$startAddress = $_POST['startadr'];
$endAddress = $_POST['endadr'];
$packageType = $_POST['packagetype'];
$weight = $_POST['weight'];
$volume = $_POST['volume'];
$volumeType = $_POST['volumetype'];
session_start();
$user = $_SESSION["user"];


// 在执行下面的 INSERT 查询之前，确保先进行了数据库连接
$sql_getusrID = "SELECT user.uID FROM user WHERE uname='$user'";


$result = mysqli_query($conn, $sql_getusrID);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $usrID = $row['uID'];
}

$sql_getdID = "SELECT user.uname, user.uID 
               FROM user JOIN delivery_manager USING(uID) JOIN courier_station USING(csID)
               WHERE csaddress='$startAddress'";
$result=mysqli_query($conn,$sql_getdID);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $dID = $row['uID'];
  $dname = $row['uname'];
}

// echo $volume, $weight, $startAddress, $packageType, $usrID,$endAddress, $dID;

// 构造 SQL 查询语句来插入数据
$sql = "INSERT INTO parcel (volume, weight, location, parceltype, status, cust_send_uID, send_address, send_storage_time,delivery_managerUID)
        VALUES ('$volume', '$weight', '$startAddress', 'others', 'pending', '$usrID','$endAddress', NOW(),'$dID')";


// // 执行 SQL 查询
if(mysqli_query($conn, $sql)) {
    echo "Data inserted successfully.";
    $sql = "SELECT utype FROM user WHERE uname='$user'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
    $row = mysqli_fetch_assoc($result);
    $usertype=$row['utype'];}
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
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
