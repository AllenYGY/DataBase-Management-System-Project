<?php

include "03_connectDB.php";

$user  = $_POST["usr"];
$pwd  = $_POST["pwd"];

session_start();
$uID = $_SESSION["uID"];


$sql = "SELECT * FROM customer WHERE uname = '$user' AND upassword = '$pwd';";



$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $sql = "DELETE FROM customer WHERE uID = '$uID'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo "Delete Successfully!";
  }
  $url = "00_index.php";
  header('Location:' . $url);
} else {
  $url = "error.html";
  header('Location:' . $url);
  echo "<br><hr><br> Go back to <a href='01_login.php'>Login!</a>";
  $url = "01_login.php";
  header('Location:' . $url);
}
