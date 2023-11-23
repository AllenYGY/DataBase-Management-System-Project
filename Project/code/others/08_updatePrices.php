<?php

include "03_connectDB.php";

$fruitType  = $_POST["fruitType"];
$price  = (float)($_POST["Price"]);
$cost  = (float)($_POST["Cost"]);
$inventory = (float)($_POST["Inventory"]);
$url = $_POST["url"];

if (!empty($price)) {
    $sql = "UPDATE fruits SET `price`=$price  WHERE fruitType='$fruitType'";
    $result = mysqli_query($conn, $sql);
    if ($result < 0) {
        echo "<script> alert('update failed.') </script> ";
        header('Location:' . $url);
    }
}
if (!empty($cost)) {
    $sql = "UPDATE fruits SET `cost`=$cost  WHERE fruitType='$fruitType'";
    $result = mysqli_query($conn, $sql);
    if ($result < 0) {
        echo "<script> alert('update failed.') </script> ";
        header('Location:' . $url);
    }
}
if (!empty($inventory)) {
    $sql = "UPDATE fruits SET `inventory`=$inventory WHERE fruitType='$fruitType'";
    $result = mysqli_query($conn, $sql);
    if ($result < 0) {
        echo "<script> alert('update failed.') </script> ";
        header('Location:' . $url);
    }
}
if (!empty($url)) {
    $sql = "UPDATE fruits SET `url`='$url'  WHERE fruitType='$fruitType'";
    $result = mysqli_query($conn, $sql);
    if ($result < 0) {
        echo "<script> alert('update failed.') </script> ";
        header('Location:' . $url);
    }
}
$url = "08_admin_page.php";
header('Location:' . $url);

// $sql = "UPDATE fruits SET `price`=$price,`cost`=$cost,`inventory`=$inventory  WHERE fruitType='$fruitType'";

// $result = mysqli_query($conn, $sql);

// $url = "08_admin_page.php";
