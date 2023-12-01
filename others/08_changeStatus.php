<?php

include "03_connectDB.php";

// echo"Connected!<br>";
$mid = $_GET['mid'];
$type=$_GET['fruitType'];
echo"$mid";
$com="Available";
if(strcmp($mid, $com) == 0)
{
    $sql = "UPDATE fruits SET status = 'Unavailable' WHERE fruitType='$type';";
}else{
    $sql = "UPDATE fruits SET status = 'Available' WHERE fruitType='$type';";
}

$result = mysqli_query($conn, $sql);

$url = "08_admin_page.php";
if ($result > 0) {
    header('Location:' . $url);
} else {
    echo "<script> alert('update failed.') </script> ";
    header('Location:' . $url);
}
