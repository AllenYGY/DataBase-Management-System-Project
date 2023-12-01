<?php

include "03_connectDB.php";

$fruitType  = $_POST["fruitType"];
$price  = (float)$_POST["Price"];
$cost  = (float)$_POST["Cost"];
$inventory = (float)$_POST["Inventory"];
$url = $_POST["url"];

$sql = "INSERT INTO fruits (fruitType, price, inventory, cost, url, status) 
        VALUES ('$fruitType', $price, $inventory, $cost, '$url', 'Available')";
$result = mysqli_query($conn, $sql);
$url = "08_admin_page.php";
if ($result > 0) {
    header('Location:' . $url);
} else {
    echo "<script> alert('update failed.') </script> ";
    header('Location:' . $url);
}
