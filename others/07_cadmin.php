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

$sql_user = "SELECT * from user WHERE uname='$user'";
$result = mysqli_query($conn, $sql_user);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $name = $row["uname"];
  $phone = $row["uphone"];
  $mail = $row["umail"];
  $gender = $row["ugender"];
}
// $sql_parcel = "SELECT * FROM parcel JOIN user WHERE uname='$user'";
// $result1 = mysqli_query($conn, $sql_parcel);

// if (mysqli_num_rows($result1) > 0) {
//   while ($row = mysqli_fetch_assoc($result1)) {
//     $status = $row["status"];

//     // 获取每一种状态对应的多行数据
//     switch ($status) {
//       case 'pending':
//         // 处理 pending 状态的多行数据
//         $pendingData[] = $row;
//         break;
//       case 'in_transit':
//         // 处理 in_transit 状态的多行数据
//         $inTransitData[] = $row;
//         break;
//       case 'delivered':
//         // 处理 delivered 状态的多行数据
//         $deliveredData[] = $row;
//         break;
//       default:
//         // 处理其他未知状态的多行数据
//         $otherData[] = $row;
//         break;
//     }
//   }
// }
?>


<body>
  <main>
    <nav class="main-menu">
      <h1>Courier Manager</h1>
      <img class="logo" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/4cfdcb5a-0137-4457-8be1-6e7bd1f29ebb" alt="" />
      <ul>
        <li class="nav-item active" id="homeNavItem">
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

      </ul>
    </nav>
    <section class="content">
      <div class="left-content">
        <div class="activities">
          <h1>Activities</h1>
          <div class="activity-container">

            <div class="image-container img-three">
              <img src="/Project/image/pickup.jpg" alt="pick" />
              <div class="overlay">
                <h3>Check package</h3>
              </div>
            </div>

            <div class="image-container img-four">
              <img src="/Project/image/delivery.jpg" alt="send" />
              <div class="overlay">
                <h3>Search delivery</h3>
              </div>
            </div>
          </div>
        </div>

        <div class="left-bottom">
          <div class="weekly-schedule">
            <h1>Package status</h1>
            <div class="calendar">
              <div class="day-and-activity activity-one">
                <div class="day">
                  <h1>2</h1>
                  <p>SAT</p>
                </div>
                <div class="activity">
                  <h2>Package</h2>
                  <div class="participants">
                  </div>
                </div>
                <button class="btn">Search</button>
              </div>

              <div class="day-and-activity activity-two">
                <div class="day">
                  <h1>1</h1>
                  <p>FRI</p>
                </div>
                <div class="activity">
                  <h2>Package</h2>
                  <div class="participants">

                  </div>
                </div>
                <button class="btn">Search</button>
              </div>

              <div class="day-and-activity activity-three">
                <div class="day">
                  <h1>30</h1>
                  <p>THR</p>
                </div>
                <div class="activity">
                  <h2>Package</h2>
                  <div class="participants">

                  </div>
                </div>
                <button class="btn">Search</button>
              </div>

              <div class="day-and-activity activity-four">
                <div class="day">
                  <h1>29</h1>
                  <p>WED</p>
                </div>
                <div class="activity">
                  <h2>Package</h2>
                  <div class="participants">

                  </div>
                </div>
                <button class="btn">Search</button>
              </div>
            </div>
          </div>

          <div class="personal-bests">
            <h1>Express station status</h1>
            <div class="personal-bests-container">
              <div class="best-item box-one">
                <p>Opening Hours:<br> 7 am. - 10 pm.</p>
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/242bbd8c-aaf8-4aee-a3e4-e0df62d1ab27" alt="" />
              </div>
              <div class="best-item box-two">
                <p>Crowded state:<br> Free </p>
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/a3b3cb3a-5127-498b-91cc-a1d39499164a" alt="" />
              </div>
              <div class="best-item box-three">
                <p></p>
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/e0ee8ffb-faa8-462a-b44d-0a18c1d9604c" alt="" />
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
              <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/test.jpg" alt="user" />
            </div>
            <div class="info-container info-one">
              <table>
                <tr>
                  <td>Name:</td>
                  <td><?php echo $name; ?></td>
                </tr>
                <tr>
                  <td>Phone:</td>
                  <td><?php echo $phone; ?></td>
                </tr>
                <tr>
                  <td>Mail: </td>
                  <td><?php echo $mail; ?></td>
                </tr>
                <tr>
                  <td>Gender:</td>
                  <td><?php echo $gender; ?></td>
                </tr>
                <tr>
                  <td>Address:</td>
                  <td>123 Main Street, City, Country</td>
                </tr><br>
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

      <!-- left-content end -->

      <div class="right-content">
        <div class="user-info">
          <div class="icon-container">
            <i class="fa fa-bell nav-icon"></i>
            <i class="fa fa-message nav-icon"></i>
          </div>
          <h4>AllenYGY</h4>
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
  <script src="script.js"></script>
</body>

</html>