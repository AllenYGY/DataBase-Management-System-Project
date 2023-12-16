<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courier Manager</title>
  <link rel="stylesheet" href="index.css">
</head>

<?php
include "03_connectDB.php";
session_start();
$user = $_SESSION["user"];
$usertype = $_SESSION["usertype"];

$url = '01_login.php';
if ($usertype != 'cadmin') header('Location:' . $url);

//Get user information
$sql_user = "SELECT * FROM cadmin  WHERE uname='$user'";
$result = mysqli_query($conn, $sql_user);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $name = $row["uname"];
  $phone = $row["uphone"];
  $mail = $row["umail"];
  $gender = $row["ugender"];
  $userID = $row["uID"];
  $csID = $row["csID"];
}

$sql_getcsadr = "SELECT * FROM courier_station WHERE csID='$csID'";

$result1 = mysqli_query($conn, $sql_getcsadr);

if (mysqli_num_rows($result1) > 0) {
  $row = mysqli_fetch_assoc($result1);
  $csadr = $row['csaddress'];
  $csstartTime = $row['start_time'];
  $csendTime = $row['end_time'];
}

$_SESSION["userID"] = $userID;
$_SESSION["uphone"] = $phone;
$_SESSION["umail"] = $mail;
$_SESSION["ugender"] = $gender;
$_SESSION["csID"] = $csID;
$_SESSION["csadr"] = $csadr;


$sql_parcel = "SELECT * FROM parcel 
                      JOIN courier_station ON send_csID=csID
                      JOIN cadmin USING(csID) 
              WHERE cadmin.uID='$userID'";

$result1 = mysqli_query($conn, $sql_parcel);
$pendingCount = 0;
$inTransitCount = 0;

if (mysqli_num_rows($result1) > 0) {
  while ($row = mysqli_fetch_assoc($result1)) {
    $status = $row["status"];
    switch ($status) {
      case 'pending':
        $pendingData[] = $row;
        $pendingCount++;
        break;
    }
  }
}

$sql_parcel = "SELECT * FROM parcel 
                      JOIN courier_station ON pick_csID=csID
                      JOIN cadmin USING(csID) 
              WHERE cadmin.uID='$userID'";
$result2 = mysqli_query($conn, $sql_parcel);

if (mysqli_num_rows($result2) > 0) {
  while ($row = mysqli_fetch_assoc($result2)) {
    $status = $row["status"];
    switch ($status) {
      case 'in_transit':
        $inTransitData[] = $row;
        $inTransitCount++;
        break;
    }
  }
}

?>

<body>
  <main>
    <nav class="main-menu">
      <h1>Courier Station</h1>
      <img class="logo" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/4cfdcb5a-0137-4457-8be1-6e7bd1f29ebb" alt="" />
      <ul>
        <li class="nav-item" id="homeNavItem">
          <b></b>
          <b></b>
          <a href="07_cadmin.php">
            <i class="fa fa-house nav-icon"></i>
            <span class="nav-text">Home</span>
          </a>
        </li>

        <li class="nav-item" id="profileNavItem">
          <b></b>
          <b></b>
          <a href="07_cadmin.php">
            <i class="fa fa-user nav-icon"></i>
            <span class="nav-text">Profile</span>
          </a>
        </li>

        <li class="nav-item active" id="searchNavItem">
          <b></b>
          <b></b>
          <a href="#">
            <i class="fa fa-search nav-icon"></i>
            <span class="nav-text">Search</span>
          </a>
        </li>

        <li class="nav-item" id="historyNavItem">
          <b></b>
          <b></b>
          <a href="07_cadmin.php">
            <i class="fa fa-history nav-icon"></i>
            <span class="nav-text">History</span>
          </a>
        </li>

        <li class="nav-item">
          <b></b>
          <b></b>
          <a href="01_login.php">
            <i class="fa fa-sign-out nav-icon"></i>
            <span class="nav-text">Log out</span>
          </a>
        </li>

      </ul>
    </nav>

    <section class="content">



      <div class="left-content">
        <div class="weekly-schedule">
            <h2>Search History</h2><br>

        </div>
      </div>
      <!-- </div> -->



      <!-- </div> -->
      <!-- left-content end  -->

      <!-- right-content -->
      <div class="right-content">
        <div class="user-info">
          <div class="icon-container">
            <i class="fa fa-bell nav-icon"></i>
            <i class="fa fa-message nav-icon"></i>
          </div>
          <h4><?php echo $name; ?></h4>
          <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/test.jpg" alt="user" />
        </div>

        <div class="friends-activity">
          <h1>Friends' Package</h1>
          <div class="card-container">
            <div class="card">
              <div class="card-user-info">
                <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/DJY.png" alt="SJY" />
                <h2>SJY</h2>
              </div>
              <img class="card-img" src="/Project/image/pick.jpg" alt="pickup" />
              <p>I just recive a new package today. Please help me pick up the package.</p>
            </div>

            <div class="card card-two">
              <div class="card-user-info">
                <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/DSX.png" alt="DSX" />
                <h2>DSX</h2>
              </div>
              <img class="card-img" src="/Project/image/pick.jpg" alt="pickup" />
              <p>I just recive a new package today. Please help me pick up the package.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
  <script src="script_cadmin.js"></script>
</body>

</html>