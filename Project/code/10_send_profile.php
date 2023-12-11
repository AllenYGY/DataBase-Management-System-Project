<?php
// 假设这里包含了连接数据库的代码，比如 include "03_connectDB.php";
// 假设 $conn 是数据库连接的变量

session_start();
$user = $_SESSION["user"]; // 从会话中获取用户名

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $startadr = mysqli_real_escape_string($conn, $_POST["startadr"]);
    $endadr = mysqli_real_escape_string($conn, $_POST["endadr"]);
    $packagetype = mysqli_real_escape_string($conn, $_POST["packagetype"]);
    $volumetype = mysqli_real_escape_string($conn, $_POST["volumetype"]);

    // 插入数据到数据库
    $insertQuery = "INSERT INTO packages (uname, start_address, end_address, package_type, volume_type) VALUES ('$user', '$startadr', '$endadr', '$packagetype', '$volumetype')";
    
    if (mysqli_query($conn, $insertQuery)) {
        echo "Package information submitted successfully!";
        // 这里可以重定向用户到其他页面或者显示成功消息
    } else {
        echo "Error submitting package information: " . mysqli_error($conn);
    }
}
?>
