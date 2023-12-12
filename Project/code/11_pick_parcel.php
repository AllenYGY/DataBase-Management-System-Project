<?php
include "03_connectDB.php";

session_start();
$user = $_SESSION["user"]; // 从会话中获取用户名

$packageID = $_POST["packageid"];
$pickpwd = $_POST["pickpwd"];



$sql_parcel = "SELECT * FROM parcel JOIN user  on parcel.cust_pick_uID=user.uID WHERE uname='$user' AND user.uID=parcel.cust_pick_uID";

$result2 = mysqli_query($conn, $sql_parcel);

if (mysqli_num_rows($result1) > 0) {
  while ($row = mysqli_fetch_assoc($result2)) {
    $status = $row["status"];
    switch ($status) {
      case 'delivered':
        $deliveredData[] = $row;
        $deliveredCount += 1;
        break;
    }
  }
}




// 查询数据库以验证包裹 ID 和密码是否匹配
$sql = "SELECT * FROM packages WHERE package_id='$packageid' AND uname='$user'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $storedPassword = $row['password'];

  // 检查密码是否匹配
  if ($pickpwd === $storedPassword) {
    // 匹配，执行拿取包裹的操作
    // 这里可以进行相应的操作，比如更新包裹状态、移除包裹等
    echo "Package picked successfully!";
  } else {
    echo "Password doesn't match!";
  }
} else {
  echo "Invalid package ID or package not found!";
}
