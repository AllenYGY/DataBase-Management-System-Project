<?php
include "03_connectDB.php";

session_start();
$user = $_SESSION["user"]; // 从会话中获取用户名
$utype = $_SESSION["usertype"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // 获取表单数据
  // $newusr = mysqli_real_escape_string($conn, $_POST["newusr"]);
  $newPhone = mysqli_real_escape_string($conn, $_POST["newPhone"]);
  $newMail = mysqli_real_escape_string($conn, $_POST["newMail"]);
  $newGender = mysqli_real_escape_string($conn, $_POST["newGender"]);
  $oldpwd = mysqli_real_escape_string($conn, $_POST["oldpwd"]);
  $editpwd = mysqli_real_escape_string($conn, $_POST["editpwd"]);

  // 查询旧密码是否匹配
  $sql = "SELECT * FROM customer WHERE uname='$user'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['upassword'];
    $storedmail = $row['umail'];
    $storedgender = $row['ugender'];


    if ($oldpwd === $storedPassword) {

      if ($utype == 'customer')
        $updateQuery = "UPDATE customer SET ";
      if ($utype == 'cadmin')
        $updateQuery = "UPDATE cadmin SET ";
      if ($utype == 'admin')
        $updateQuery = "UPDATE admin SET ";

      // 只有在有新用户名时才更新用户名字段
      // if (!empty($newusr)) {
      //   $updateQuery .= ", uname='$newusr'";
      // }
      $check = 0;

      if (!empty($newPhone)) {
        $updateQuery .= " uphone='$newPhone'";
        $check = 1;
      }

      if (!empty($newMail)) {
        $updateQuery .= " umail='$newMail'";
        $check = 1;
      }

      if (!empty($newGender)) {
        $updateQuery .= " umail='$newGender'";
        $check = 1;
      }

      if (!empty($editpwd)) {
        $updateQuery .= " upassword='$editpwd'";
        $check = 1;
      }

      if ($check == 1) {
        $updateQuery .= " WHERE uname='$user'";
        echo $updateQuery;
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
          echo "User information updated successfully!";
          // echo $usertype;
          if ($utype == "customer") {
            $url = "06_customer.php";
          }
          if ($utype == "cadmin")
            $url = "07_cadmin.php";
          if ($utype == "admin") {
            $url = "08_admin.php";
          }
        } else {
          echo "Error updating user information: " . mysqli_error($conn);
        }
      }
    } else {
      echo "Old password doesn't match!";
    }
  }
}
header('Location:' . $url);
