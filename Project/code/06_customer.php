<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>user page</title>
  <link rel="stylesheet" href="index.css">
</head>

<?php
date_default_timezone_set('Asia/Shanghai');
include "03_connectDB.php";
session_start();

$uID = $_SESSION["uID"];
$usertype = $_SESSION["usertype"];
$flag = $_SESSION["flag"];

$url = '01_login.php';

if ($usertype != 'customer') header('Location:' . $url);
$start = microtime(true);

$sql_user = "SELECT * from customer WHERE uID=$uID";

$result = mysqli_query($conn, $sql_user);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $name = $row["uname"];
  $gender = $row["ugender"];
  $imageData = $row["upicture"];
}

$sql_user_email = "SELECT * FROM customer_email WHERE uID=$uID";
$result_email = mysqli_query($conn, $sql_user_email);
if (mysqli_num_rows($result_email) > 0) {
  $row = mysqli_fetch_assoc($result_email);
  $mail = $row["umail"];
}

$sql_user_phone = "SELECT * FROM customer_phone WHERE uID=$uID";
$result_phone = mysqli_query($conn, $sql_user_phone);
if (mysqli_num_rows($result_phone) > 0) {
  $row = mysqli_fetch_assoc($result_phone);
  $phone = $row["uphone"];
}


$sql_parcel = "SELECT * ,send_station.csaddress AS send_adr, pick_station.csaddress AS pick_adr
              FROM parcel
              JOIN customer ON parcel.cust_send_uID=customer.uID 
              JOIN courier_station AS send_station ON send_station.csID=parcel.send_csID
              JOIN courier_station AS pick_station ON pick_station.csID=parcel.pick_csID
              WHERE uname='$name' AND customer.uID=parcel.cust_send_uID";

$result_parcel = mysqli_query($conn, $sql_parcel);

$pendingCount = 0;
$inTransitCount = 0;
$deliveredCount = 0;
$acceptCount = 0;

if (mysqli_num_rows($result_parcel) > 0) {
  while ($row = mysqli_fetch_assoc($result_parcel)) {
    $status = $row["status"];
    switch ($status) {
      case 'pending':
        $pendingData[] = $row;
        $pendingCount += 1;
        break;
      case 'in_transit':
        $inTransitData[] = $row;
        $inTransitCount += 1;
        break;
    }
    $allData[] = $row;
  }
}

$sql_parcel_1 = "SELECT * ,send_station.csaddress AS send_adr, pick_station.csaddress AS pick_adr
               FROM parcel 
                JOIN customer ON parcel.cust_pick_uID=customer.uID 
                JOIN courier_station AS send_station ON send_station.csID=parcel.send_csID
                JOIN courier_station AS pick_station ON pick_station.csID=parcel.pick_csID
               WHERE uname='$name' AND customer.uID=parcel.cust_pick_uID";

$result2 = mysqli_query($conn, $sql_parcel_1);

if (mysqli_num_rows($result2) > 0) {
  while ($row = mysqli_fetch_assoc($result2)) {
    $status = $row["status"];
    switch ($status) {
      case 'delivered':
        $deliveredData[] = $row;
        $deliveredCount += 1;
        break;
      case 'accept':
        $acceptData[] = $row;
        $acceptCount += 1;
        break;
    }
    $allData[] = $row;
  }
}
$_SESSION["allData"] = $allData;
$end = microtime(true);

$timeDiff = $end - $start;
?>

<body>
  <main>
    <nav class="main-menu">
      <h1>Courier Station</h1>
      <img class="logo" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/4cfdcb5a-0137-4457-8be1-6e7bd1f29ebb" alt="" />
      <ul>
        <li class="nav-item active" id="homeNavItem">
          <b></b>
          <b></b>
          <a href="06_customer.php">
            <i class="fa fa-house nav-icon"></i>
            <span class="nav-text">Home</span>
          </a>
        </li>

        <li class="nav-item" id="profileNavItem">
          <b></b>
          <b></b>
          <a href="#">
            <i class="fa fa-user nav-icon"></i>
            <span class="nav-text">Profile</span>
          </a>
        </li>

        <li class="nav-item" id="pickPackageNavItem">
          <b></b>
          <b></b>
          <a href="#">
            <i class="fa fa-get-pocket nav-icon"></i>
            <span class="nav-text">Pick package</span>
          </a>
        </li>

        <li class="nav-item" id="sendPackageNavItem">
          <b></b>
          <b></b>
          <a href="#">
            <i class="fa fa-gift nav-icon"></i>
            <span class="nav-text">Send package</span>
          </a>
        </li>

        <li class="nav-item" id="searchNavItem">
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
          <a href="#">
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

        <li class="nav-item">
          <b></b>
          <b></b>
          <a href="#" onclick="showAlert()">
            <i class="fa fa-minus nav-icon"></i>
            <span class="nav-text">Log off</span>
          </a>
        </li>

        <div id="confirmPassword" style="display: none;">
          <form id="passwordForm" onsubmit="submitPassword(event)">
            <label for="password">Enter your password to confirm:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password to confirm:">
            <button type="submit">Confirm</button>
          </form>
        </div>

      </ul>
    </nav>

    <section class="content">
      <div class="left-content">
        <div class="activities">
          <h1>Activities</h1>
          <?php echo "Code Run time:" . $timeDiff . " s"; ?>
          <div class="activity-container">

            <div class="image-container img-one" id="pickimg">
              <img src="Image/pick.jpg" alt="pick">
              <div class="overlay">
                <h3>Pick package</h3>
              </div>
            </div>

            <div class="image-container img-two" id="sendimg">
              <img src="Image/send.jpg" alt="send">
              <div class="overlay">
                <h3>Send package</h3>
              </div>
            </div>
          </div>
        </div>

        <div class="left-bottom">
          <div class="weekly-schedule">
            <h2>Package status</h2>
            <?php
            $date = date('d');
            $day = date('D');
            //? Wait accept part
            echo "<h3>Waiting for accept</h3>";
            echo "<div class='calendar'>";
            if ($deliveredCount) {
              echo "              
                  <div class='day-and-activity activity-one'>
                      <div class='day'>
                        <h1>$date</h1>
                        <p>$day</p>
                      </div>
                      <div class='activity'>
                        <h3>$deliveredCount Packages is delivered.</h3>
                        <div class='participants'> </div>
                      </div>
                    <button class='btn' id='acceptbtn'>Accept</button>
                  </div>
                ";
            } else {
              echo "              
              <div class='day-and-activity activity-one'>
                  <div class='day'>
                    <h1>$date</h1>
                    <p>$day</p>
                  </div>
                  <div class='activity'>
                    <h3>No packages need to be accept</h3>
                  </div>
                  <button class='btn' id='acceptbtn'>Check</button>
              </div>
            ";
            }
            echo "</div>";

            //? Wait send part
            echo "<h3>Waiting for send</h3>";
            if ($pendingCount) {
              echo "              
                  <div class='day-and-activity activity-two'>
                      <div class='day'>
                        <h1>$date</h1>
                        <p>$day</p>
                      </div>
                      <div class='activity'>
                        <h3>$pendingCount Packages is waiting for send.</h3>
                      </div>
                    <button class='btn' id='checkbtn1'>Check</button>
                  </div>
                ";
            } else {
              echo "              
              <div class='day-and-activity activity-two'>
                  <div class='day'>
                    <h1>$date</h1>
                    <p>$day</p>
                  </div>
                  <div class='activity'>
                    <h3>No packages need to be send</h3>
                  </div>
                  <button class='btn' id='checkbtn1'>Check</button>
              </div>
            ";
            }
            echo "<h3>Deliverying packages</h3>";
            // ? Transporting
            if ($inTransitCount) {
              echo "              
                  <div class='day-and-activity activity-three'>
                      <div class='day'>
                        <h1>$date</h1>
                        <p>$day</p>
                      </div>
                      <div class='activity'>
                        <h3>$inTransitCount Packages is transporting.</h3>
                      </div>
                    <button class='btn' id='checkbtn2'>Check</button>
                  </div>
                ";
            } else {
              echo "              
              <div class='day-and-activity activity-three'>
                  <div class='day'>
                    <h1>$date</h1>
                    <p>$day</p>
                  </div>
                  <div class='activity'>
                    <h3>No packages are transporting.</h3>
                  </div>
                  <button class='btn' id='checkbtn2'>Check</button>
              </div>
            ";
            }
            echo "</div>";
            ?>
            <div class="personal-bests">
              <h1>Courier station status</h1>
              <div class="personal-bests-container">
                <div class="best-item box-one">
                  <p>Opening Hours:<br> 7 am. - 10 pm.</p>
                  <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/242bbd8c-aaf8-4aee-a3e4-e0df62d1ab27" alt="" />
                </div>
                <div class="best-item box-one-1">
                  <p>Crowded state:<br> Free</p>
                  <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/a3b3cb3a-5127-498b-91cc-a1d39499164a" alt="" />
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Profile section -->
        <div class="profile">
          <div class="activities">
            <h1>Profile</h1>
            <div class="activity-container">
              <div class="image-icon">

                <?php
                if ($imageData === NULL || $imageData === '') {
                  echo '<img src="Image/user.png" alt="user" />';
                } else {
                  echo '<img src="data:image/png;base64,' . base64_encode($imageData) . '"/>';
                }
                ?>

              </div>

              <div class="info-container info-one">
                <table>
                  <tr>
                    <td>Name:</td>
                    <td><?php echo $name; ?></td>
                  </tr>
                  <tr>
                    <td>User ID:</td>
                    <td><?php echo $uID; ?></td>
                  </tr>
                  <tr>
                    <td>Gender:</td>
                    <td><?php echo $gender; ?></td>
                  </tr>
                  <tr>
                    <td>Phone:</td>
                    <td><?php echo $phone; ?></td>
                  </tr>
                  <tr>
                    <td>Mail: </td>
                    <td><?php echo $mail; ?></td>
                  </tr>
                  <br>
                </table>
              </div>
              <button class="info-container editbtn" id="openPop">Edit</button>
            </div>
          </div>
          <div class="friends-list">
            <h1>Your Frinds</h1>
            <div class="calendar">
              <div class="day-and-activity activity-one">
                <div class="day">
                  <h1>13</h1>
                  <p>mon</p>
                </div>
                <div class="activity">
                  <div class="participants">
                    <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/DSX.png" />
                    <h2>DSX</h2>
                  </div>
                </div>
                <button class="btn">Check</button>
              </div>

              <div class="day-and-activity activity-two">
                <div class="day">
                  <h1>15</h1>
                  <p>wed</p>
                </div>
                <div class="activity">
                  <div class="participants">
                    <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/DJY.png" />
                    <h2>DJY</h2>
                  </div>

                </div>
                <button class="btn">Check</button>
              </div>

              <div class="day-and-activity activity-three">
                <div class="day">
                  <h1>17</h1>
                  <p>fri</p>
                </div>
                <div class="activity">
                  <div class="participants">
                    <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/c61daa1c-5881-43f8-a50f-62be3d235daf" style="--i: 1" alt="" / <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/07d4fa6f-6559-4874-b912-3968fdfe4e5e" style="--i: 3" alt="" />
                    <h2>FriendsA</h2>
                  </div>
                </div>
                <button class="btn">Check</button>
              </div>

              <div class="day-and-activity activity-four">
                <div class="day">
                  <h1>18</h1>
                  <p>sat</p>
                </div>
                <div class="activity">
                  <div class="participants">
                    <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/90affa88-8da0-40c8-abe7-f77ea355a9de" style="--i: 2" alt="" />
                    <h2>FriendsB</h2>
                  </div>
                </div>
                <button class="btn">Check</button>
              </div>
            </div>
          </div>
        </div>

        <!-- pick section -->
        <div class="pickpart">

          <div class="weekly-schedule">

            <form id="pickForm" action="11_pick_parcel.php" method="POST">
              <div class="form-group">
                <h1>Pick package</h1><br>
                <label for="packageid">Package ID:</label>
                <input type="text" id="packageid" name="packageid" placeholder="Enter your package ID" autocomplete="username">
              </div>
              <div class="form-group">
                <label for="pickpwd">Password:</label>
                <input type="password" id="pickpwd" name="pickpwd" placeholder="Enter your password" autocomplete="current-password">
              </div>
              <input type="submit" value="Pick" id="pickButton">
            </form>
            <h1>Packages need to be pick</h1>
            <?php
            echo "<div class='calendar'>";
            if (isset($deliveredData)) {
              foreach ($deliveredData as $deliveredRow) {
                $send_time = date('Y-m-d', strtotime($deliveredRow['send_time']));
                $dayOfWeek = date('l', strtotime($send_time)); // 获取星期几
                $send_time = date('d', strtotime($deliveredRow['send_time']));
                $pID = $deliveredRow['parcelID'];
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
                        <h1>$send_time</h1>
                        <p>$day</p>
                    </div>
                    <div class='activity'>
                        <h2>Package ID: $pID</h2>
                    </div>
                    <button class='btn' onclick=\"fillForm('$pID')\">Go to pick</button>
                </div>
            ";
              }
            } else {
              echo "              
                <div class='day-and-activity activity-four'>
                    <div class='day'>
                      <h1>$date</h1>
                      <p>$day</p>
                    </div>
                    <div class='activity'>
                      <h2>No current Packages need to be accept</h2>
                    </div>
                </div>
              ";
            }
            echo "</div>";
            ?>
          </div>
        </div>

        <!-- send section -->
        <div class="sendpart">
          <form action="10_send_parcel.php" method="POST" id='send_parcel_form'>
            <h1>Send package</h1><br>
            <div class="form-group">
              <label for="startadr">Mailing Address:</label>
              <select id="provinceSelect" name="provinceSelect">
                <option value="">SELECT PROVINCE</option>
              </select>
              <select id="citySelect" name="citySelect">
                <option value="">SELECT CITY</option>
              </select>
              <select id="districtSelect" name="districtSelect">
                <option value="">SELECT DISTRICT</option>
              </select>

            </div>
            <div class="form-group">
              <label for="spadr">Reciving Address:</label>
              <select id="endprovinceSelect" name="endprovinceSelect">
                <option value="">SELECT PROVINCE</option>
              </select>
              <select id="endcitySelect" name="endcitySelect">
                <option value="">SELECT CITY</option>
              </select>
              <select id="enddistrictSelect" name="enddistrictSelect">
                <option value="">SELECT DISTRICT</option>
              </select>
              <input type="text" id="spadr" name="spadr" placeholder="Enter specific address" required>
            </div>
            <div class="form-group">
              <label for="packagetype">Package Type:</label>
              <select id="packagetype" name="packagetype">
                <option value="fooditem">Food</option>
                <option value="drugitem">Drug</option>
                <option value="fileitem">File</option>
                <option value="clothitem">cloth</option>
                <option value="digitalitem">Digital Device</option>
                <option value="fragileitem">Fragile</option>
                <option value="freshitem">Fresh food</option>
                <option value="others">Others</option>
              </select>
            </div>
            <div class="form-group">
              <label for="weight">Weight: (Kg)</label>
              <input type="number" step="0.01" id="weight" name="weight" placeholder="Enter weight in kilograms" required min="0" max="300">
            </div>
            <div class="form-group">
              <label for="volume">Volume: (Litre)</label>
              <input type="number" step="0.01" id="volume" name="volume" placeholder="Enter volume in litres" required min="0" max="300">
            </div>
            <div class="form-group">
              <label for="cust_pick_uID">Receiver's ID: </label>
              <input type="number" id="cust_pick_uID" name="cust_pick_uID" placeholder="Enter Receiver's ID" required min="0">
            </div>
            <input type="submit" value="Send" id="sendButton">
          </form>
        </div>

        <!-- Search & History section -->
        <div class="search-hitorypart">
          <div class="weekly-schedule">
            <h2>Search History</h2><br>
            <div id="searchHistory" class="container">
              <form method="get">
                <div class="form-group">
                  <label for="parcelID">Package's ID: </label>
                  <input type="number" id="parcelID" name="parcelID" placeholder="Enter package's ID">
                </div>
                <input type="submit" value="Search" id="Search">
              </form>
            </div>
            <br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
              echo "<h2>Search Result</h2><br>";
              if (isset($_GET['parcelID'])) {
                $targetParcelID = $_GET['parcelID'];
                $check = 0;
                if ($targetParcelID !== null) {
                  foreach ($allData as $row) {
                    if ($row['parcelID'] == $targetParcelID) {
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
                      break;
                    }
                  }
                  if ($check == 0) {
                    echo "Package Not Found!";
                  }
                  $_SESSION["flag"] = 1;
                }
              }
              if (isset($_GET['pstatus']) || (isset($_GET['start_date']) && isset($_GET['end_date']))) {
                // 处理用户输入数据
                $parcelID = $_GET['parcelID'];
                $pstatus = $_GET['pstatus'];
                $startDate = $_GET['start_date'];
                $endDate = $_GET['end_date'];
              }
            }
            ?>

            <ul class="collapse-container">
              <h2>Package History</h2><br>
              <li class='item'>
                <h2 class='item-title'>
                  Packages waiting to be accepted
                  <i class='fa fa-chevron-down' aria-hidden='true'></i>
                </h2>
                <div class='item-content'>
                  <?php
                  if (isset($deliveredData)) {
                    foreach ($deliveredData as $deliveredDataRow) {
                      $send_time = $deliveredDataRow['send_time'];
                      $send_storage_time = $deliveredDataRow['send_storage_time'];
                      $pick_storage_time = isset($deliveredDataRow['pick_storage_time']) ? $deliveredDataRow['pick_storage_time'] : 'unknown';
                      $dayOfWeek = isset($send_time) ? date('l', strtotime($send_time)) : 'unknown';
                      $date = isset($deliveredDataRow['send_storage_time']) ? date('d', strtotime($deliveredDataRow['send_storage_time'])) : 'unknown';
                      $pID = isset($deliveredDataRow['parcelID']) ? $deliveredDataRow['parcelID'] : 'unknown';
                      $startadr = isset($deliveredDataRow['send_adr']) ? $deliveredDataRow['send_adr'] : 'unknown';
                      $pstatus = isset($deliveredDataRow['status']) ? $deliveredDataRow['status'] : 'unknown';
                      $endadr = isset($deliveredDataRow['pick_adr']) ? $deliveredDataRow['pick_adr'] : 'unknown';
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
                          <h4>&nbsp;&nbsp;Package send courier Station: $startadr</h4>
                          <h4>&nbsp;&nbsp;Package pick courier Station: $endadr</h4>
                      </div>
                  </div>
              ";
                    }
                  } else {
                    echo "              
                <div class='day-and-activity activity-four'>
                    <div class='day'>
                      <h1>$date</h1>
                      <p>$day</p>
                    </div>
                    <div class='activity'>
                      <h2>No current Packages history</h2>
                    </div>
                </div>
              ";
                  };
                  ?>
                </div>
              </li>
              <li class='item'>
                <h2 class='item-title'>
                  Packages already accepted
                  <i class='fa fa-chevron-down' aria-hidden='true'></i>
                </h2>
                <div class='item-content'>
                  <?php
                  if (isset($acceptData)) {
                    foreach ($acceptData as $acceptDataRow) {
                      $send_time = isset($acceptDataRow['send_time']) ? $acceptDataRow['send_time'] : 'unknown';
                      $pick_time = isset($acceptDataRow['pick_time']) ? $acceptDataRow['pick_time'] : 'unknown';
                      $send_storage_time = isset($acceptDataRow['send_storage_time']) ? $acceptDataRow['send_storage_time'] : 'unknown';
                      $pick_storage_time = isset($acceptDataRow['pick_storage_time']) ? $acceptDataRow['pick_storage_time'] : 'unknown';
                      $dayOfWeek = isset($send_time) ? date('l', strtotime($send_time)) : 'unknown';
                      $date = isset($acceptDataRow['send_storage_time']) ? date('d', strtotime($acceptDataRow['send_storage_time'])) : 'unknown';
                      $pID = isset($acceptDataRow['parcelID']) ? $acceptDataRow['parcelID'] : 'unknown';
                      $startadr = isset($acceptDataRow['send_adr']) ? $acceptDataRow['send_adr'] : 'unknown';
                      $pstatus = isset($acceptDataRow['status']) ? $acceptDataRow['status'] : 'unknown';
                      $endadr = isset($acceptDataRow['pick_adr']) ? $acceptDataRow['pick_adr'] : 'unknown';
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
                              <h3>&nbsp;&nbsp;Pick time: $pick_time</h3>
                              <h4>&nbsp;&nbsp;Package send courier Station: $startadr</h4>
                              <h4>&nbsp;&nbsp;Package pick courier Station: $endadr</h4>
                          </div>
                      </div>
                  ";
                    }
                  } else {
                    echo "              
                    <div class='day-and-activity activity-four'>
                        <div class='day'>
                          <h1>$date</h1>
                          <p>$day</p>
                        </div>
                        <div class='activity'>
                          <h2>No current Packages history</h2>
                        </div>
                    </div>
                  ";
                  }
                  ?>
                </div>
              </li>

              <li class='item'>
                <h2 class='item-title'>
                  Packages in transit
                  <i class='fa fa-chevron-down' aria-hidden='true'></i>
                </h2>
                <div class='item-content'>
                  <?php
                  if (isset($inTransitData)) {
                    foreach ($inTransitData as $inTransitDataRow) {
                      $send_time = isset($inTransitDataRow['send_time']) ? $inTransitDataRow['send_time'] : 'unknown';
                      $send_storage_time = isset($inTransitDataRow['send_storage_time']) ? $inTransitDataRow['send_storage_time'] : 'unknown';
                      $dayOfWeek = isset($send_time) ? date('l', strtotime($send_time)) : 'unknown';
                      $date = isset($inTransitDataRow['send_storage_time']) ? date('d', strtotime($inTransitDataRow['send_storage_time'])) : 'unknown';
                      $pID = isset($inTransitDataRow['parcelID']) ? $inTransitDataRow['parcelID'] : 'unknown';
                      $startadr = isset($inTransitDataRow['send_adr']) ? $inTransitDataRow['send_adr'] : 'unknown';
                      $pstatus = isset($inTransitDataRow['status']) ? $inTransitDataRow['status'] : 'unknown';
                      $endadr = isset($inTransitDataRow['pick_adr']) ? $inTransitDataRow['pick_adr'] : 'unknown';

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
                          <h4>&nbsp;&nbsp;Package send courier Station: $startadr</h4>
                          <h4>&nbsp;&nbsp;Package pick courier Station: $endadr</h4>
                      </div>
                  </div>
              ";
                    }
                  } else {
                    echo "              
                <div class='day-and-activity activity-four'>
                    <div class='day'>
                      <h1>$date</h1>
                      <p>$day</p>
                    </div>
                    <div class='activity'>
                      <h2>No current Packages history</h2>
                    </div>
                </div>
              ";
                  }
                  ?>
                </div>
              </li>
              <li class='item'>
                <h2 class='item-title'>
                  Packages waiting to be send
                  <i class='fa fa-chevron-down' aria-hidden='true'></i>
                </h2>
                <div class='item-content'>
                  <?php
                  if (isset($pendingData)) {
                    foreach ($pendingData as $pendingDataRow) {
                      $send_storage_time = isset($pendingDataRow['send_storage_time']) ? $pendingDataRow['send_storage_time'] : 'unknown';
                      $dayOfWeek = isset($send_storage_time) ? date('l', strtotime($send_storage_time)) : 'unknown';
                      $date = isset($pendingDataRow['send_storage_time']) ? date('d', strtotime($pendingDataRow['send_storage_time'])) : 'unknown';
                      $pID = isset($pendingDataRow['parcelID']) ? $pendingDataRow['parcelID'] : 'unknown';
                      $startadr = isset($pendingDataRow['send_adr']) ? $pendingDataRow['send_adr'] : 'unknown';
                      $pstatus = isset($pendingDataRow['status']) ? $pendingDataRow['status'] : 'unknown';
                      $endadr = isset($pendingDataRow['pick_adr']) ? $pendingDataRow['pick_adr'] : 'unknown';
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
                          <h3>&nbsp;&nbsp;Send storage time: $send_storage_time</h3>
                          <h4>&nbsp;&nbsp;Package send courier Station: $startadr</h4>
                          <h4>&nbsp;&nbsp;Package pick courier Station: $endadr</h4>
                      </div>
                  </div>
              ";
                    }
                  } else {
                    echo "              
                <div class='day-and-activity activity-four'>
                    <div class='day'>
                      <h1>$date</h1>
                      <p>$day</p>
                    </div>
                    <div class='activity'>
                      <h2>No current Packages history</h2>
                    </div>
                </div>
              ";
                  }

                  ?>
                </div>
              </li>
            </ul>
          </div>
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
          <h4><?php echo $name; ?></h4>
          <?php
          if ($imageData === NULL || $imageData === '') {
            echo '<img src="Image/user.png" alt="user" />';
          } else {
            echo '<img src="data:image/png;base64,' . base64_encode($imageData) . '"/>';
          }
          ?>
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

      <div id="popup" class="edit-profile">
        <form action="09_edit_profile.php" method="POST">
          <div class="form-group">
            <h1>Edit Profile</h1><br>
            <!-- <label for="usr">Username: <?php echo $name; ?></label> -->
            <div class="image-icon-1">
              <?php
              if ($imageData === NULL || $imageData === '') {
                echo '<img src="Image/user.png" alt="user" />';
              } else {
                echo '<img src="data:image/png;base64,' . base64_encode($imageData) . '"/>';
              }
              ?>

            </div>
          </div>
          <div class="form-group">
            <label for="editpwd">Password:</label>
            <input type="password" id="editpwd" name="editpwd" placeholder="Edit your password" autocomplete="current-password">
          </div>
          <div class="form-group">
            <label for="newPhone">Phone:</label>
            <input type="text" id="newPhone" name="newPhone" placeholder="<?php echo $phone; ?>">
          </div>
          <div class="form-group">
            <label for="newMail">Mail:</label>
            <input type="text" id="newMail" name="newMail" placeholder="<?php echo $mail; ?>">
          </div>
          <div class="form-group">
            <label for="newGender">Gender:</label>
            <input type="text" id="newGender" name="newGender" placeholder="<?php echo $gender; ?>">
          </div>

          <div class="form-group">
            <label for="oldpwd">Old Password:</label>
            <input type="text" id="oldpwd" name="oldpwd" placeholder="Enter you password">
          </div>
          <input type="submit" value="Edit" id="editButton">
        </form>
      </div>
    </section>
  </main>
  <script src="data.js" type="module"></script>
  <script src="script.js"></script>
  <?php
  if ($flag == 1) {
    echo '<script>';
    echo 'handleSearchClick();';
    echo 'if (collapseContainer.style.display !== "none") {
      collapseContainer.style.display = "none";
    } else {
      collapseContainer.style.display = "block";
    }';
    echo '</script>';
    $_SESSION["flag"] = 0;
  }
  ?>
</body>

</html>