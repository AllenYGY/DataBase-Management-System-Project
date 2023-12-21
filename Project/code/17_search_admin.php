<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courier Manager</title>
  <link rel="stylesheet" href="index.css">
</head>

<?php
// include "03_connectDB.php";
// session_start();
// $user = $_SESSION["user"];
// $usertype = $_SESSION["usertype"];
// $flag = $_SESSION["flag"];
// $allData=$_SESSION["allData"];

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
          <a href="08_admin.php">
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
          <div id="searchHistory" class="container">
            <form method="get" action="17_search_admin.php">
              <div class="form-group">
                <label for="parcelID">Package's ID: </label>
                <input type="number" id="parcelID" name="parcelID" placeholder="Enter package's ID">
              </div>
              <!-- <div class="form-group">
                <label for="pstatus">Package's status: </label>
                <select id="pstatus" name="pstatus">
                  <option value="accept">Accept</option>
                  <option value="in_transit">Transporting</option>
                  <option value="delivered">Waiting for accept</option>
                  <option value="pending">Waiting for send</option>
                </select>
              </div>
              <div class="form-group">
                <pre>Start date:  <input type="date" id="start_date" name="start_date">                    End date:   <input type="date" id="end_date" name="end_date"></pre>
              </div> -->
              <input type="submit" value="Search" id="Search">
            </form>
          </div>

          <br>
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "GET") {
            echo "<h2>Search Result</h2><br>";
            if (isset($_GET['parcelID'])) {
              date_default_timezone_set('Asia/Shanghai');
              include "03_connectDB.php";

              $targetParcelID = $_GET['parcelID'];

              $start = microtime(true); // 记录结束时间

              $sql_user = "SELECT * from parcel WHERE parcelID='$targetParcelID'";
              $result = mysqli_query($conn, $sql_user);
              $check=0;
              if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $targetParcelData = $row;
                $send_time = $targetParcelData['send_time'];
                $send_storage_time = $targetParcelData['send_storage_time'];
                $pick_storage_time = isset($targetParcelData['pick_storage_time']) ? $targetParcelData['pick_storage_time'] : 'unknown';
                $dayOfWeek = isset($send_time) ? date('l', strtotime($send_time)) : 'unknown';
                $date = isset($targetParcelData['send_storage_time']) ? date('d', strtotime($targetParcelData['send_storage_time'])) : 'unknown';
                $pID = isset($targetParcelData['parcelID']) ? $targetParcelData['parcelID'] : 'unknown';
                $startadr = isset($targetParcelData['send_adr']) ? $targetParcelData['send_adr'] : 'unknown';
                $pstatus = isset($targetParcelData['status']) ? $targetParcelData['status'] : 'unknown';
                $endadr = isset($targetParcelData['pick_adr']) ? $targetParcelData['pick_adr'] : 'unknown';
                switch ($dayOfWeek) {
                  case 'Monday':
                    $cssClass = 'activity-one';
                    $day = 'MON';
                    break;
                  case 'Tuesday':
                    $cssClass = 'activity-two';
                    $day = 'TUE';
                    break;
                  case 'Wednesday':
                    $cssClass = 'activity-three';
                    $day = 'WED';
                    break;
                  case 'Thursday':
                    $cssClass = 'activity-four';
                    $day = 'THU';
                    break;
                  case 'Friday':
                    $cssClass = 'activity-five';
                    $day = 'FRI';
                    break;
                  case 'Saturday':
                    $cssClass = 'activity-six';
                    $day = 'SAT';
                    break;
                  default:
                    $cssClass = 'activity-seven';
                    $day = 'SUN';
                    break;
                }
                echo "
                        <div class='day-and-activity $cssClass'>
                          <div class='day'>
                            <h1>$date</h1>
                            <p>$day</p>
                          </div>
                          <div class='activity'>
                              <h2>Package ID: $pID</h2>
                              <h2>Package Status: $pstatus</h2>
                              <h3>&nbsp;&nbsp;Send time: $send_time</h3>
                              <h3>&nbsp;&nbsp;Send storage time: $send_storage_time</h3>
                              <h3>&nbsp;&nbsp;Pick storage time: $pick_storage_time</h3>
                              <h3>&nbsp;&nbsp;Package send courier Station: $startadr</h3>
                              <h3>&nbsp;&nbsp;Package pick courier Station: $endadr</h3>
                          </div>
                      </div>";
                $check = 1;
              }
            }
            if ($check == 0) {
              echo "Package Not Found!";
            }
          }


          ?>
        </div>
      </div>

      <!-- left-content end  -->

      <!-- right-content -->
      <div class="right-content">
        <div class="user-info">
          <div class="icon-container">
            <i class="fa fa-bell nav-icon"></i>
            <i class="fa fa-message nav-icon"></i>
          </div>
          <h4>Administrator</h4>
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
              <img class="card-img" src="Image/pick.jpg" alt="pickup" />
              <p>I just recive a new package today. Please help me pick up the package.</p>
            </div>

            <div class="card card-two">
              <div class="card-user-info">
                <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/DSX.png" alt="DSX" />
                <h2>DSX</h2>
              </div>
              <img class="card-img" src="Image/pick.jpg" alt="pickup" />
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