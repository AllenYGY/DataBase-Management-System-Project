<?php
include "03_connectDB.php";

session_start();
$user = $_SESSION["user"]; // 从会话中获取用户名


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // 获取表单数据
  $newusr = mysqli_real_escape_string($conn, $_POST["newusr"]);
  $newPhone = mysqli_real_escape_string($conn, $_POST["newPhone"]);
  $newMail = mysqli_real_escape_string($conn, $_POST["newMail"]);
  $newGender = mysqli_real_escape_string($conn, $_POST["newGender"]);
  $oldpwd = mysqli_real_escape_string($conn, $_POST["oldpwd"]);
  $editpwd = mysqli_real_escape_string($conn, $_POST["editpwd"]);

  // 查询旧密码是否匹配
  $sql = "SELECT utype,upassword FROM user WHERE uname='$user'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['upassword'];
    $usertype=$row['utype'];

    // 检查旧密码是否匹配
    if ($oldpwd === $storedPassword) {
      // 构建更新用户信息的 SQL 语句
      $updateQuery = "UPDATE user SET uphone='$newPhone', umail='$newMail', ugender='$newGender'";

      // 只有在有新用户名时才更新用户名字段
      if (!empty($newusr)) {
        $updateQuery .= ", uname='$newusr'";
      }

      // 只有在有新密码时才更新密码字段
      if (!empty($editpwd)) {
        $updateQuery .= ", upassword='$editpwd'";
      }
      // 添加 WHERE 子句以指定更新哪个用户
      $updateQuery .= " WHERE uname='$user'";
      // 执行更新操作
      $updateResult = mysqli_query($conn, $updateQuery);

      if ($updateResult) {
        echo "User information updated successfully!";
        // echo $usertype;
        if ($usertype == "customer") {
          $url = "06_customer.php";
        }
        if ($usertype == "cadmin")
          $url = "07_cadmin.php";
        if ($usertype == "admin") {
          $url = "08_admin.php";
        }
        header('Location:' . $url);

        // 这里可以重定向用户到其他页面或者显示成功消息
      } else {
        echo "Error updating user information: " . mysqli_error($conn);
      }
    } else {
      echo "Old password doesn't match!";
    }
  }
}
