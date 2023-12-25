<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrator</title>
  <link rel="stylesheet" href="index.css">
</head>

<?php
include "03_connectDB.php";
session_start();
$uID = $_SESSION["uID"];
$usertype = $_SESSION["usertype"];

$url = '01_login.php';
if ($usertype != 'admin') header('Location:' . $url);

$sql_user = "SELECT * FROM admin WHERE uID='$uID'";
$result = mysqli_query($conn, $sql_user);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $name = $row["uname"];
  $gender = $row["ugender"];
  $uID = $row["uID"];
  $imageData = $row["upicture"];
}

?>

<body>
  <main>
    <nav class="main-menu">
      <h1>Courier Administrator</h1>
      <img class="logo" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/4cfdcb5a-0137-4457-8be1-6e7bd1f29ebb" alt="" />
      <ul>
        <li class="nav-item active" id="homeNavItem">
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
          <a href="#">
            <i class="fa fa-user nav-icon"></i>
            <span class="nav-text">Profile</span>
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

            <div class="image-container">

              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Beijing.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Chongqing.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Fujian.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Gansu.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>


            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Guangdong.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Guangxi.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Guizhou.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Hainan.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Hebei.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Heilongjiang.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>


            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Henan.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Hongkong.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>


            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Hubei.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Hunan.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Jiangsu.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Jiangxi.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Jilin.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Liaoning.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Macao.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Neimenggu.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Ningxia.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Qinghai.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Shandong.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Shanghai.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Shanxi.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Shanxi_1.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Taiwan.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Tianjin.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Xinjiang.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Xizang.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Yunnan.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Zhejiang.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Anhui.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>
            <div class="image-container">
              <a href="17_search_admin.php?location=Guangxi"><img src="Image/map/Sichuan.jpg" alt="station" />
                <div class="overlay">
                  <h3>Courier</h3>
                </div>
              </a>
            </div>

          </div>
        </div>
      </div>


      <div class="right-content">
        <div class="user-info">
          <div class="icon-container">
            <i class="fa fa-bell nav-icon"></i>
            <i class="fa fa-message nav-icon"></i>
          </div>
          <h4>AllenYGY</h4>
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
              <p>I just recive a new package today.<br> Please help me pick up the package.</p>
            </div>

            <div class="card card-two">
              <div class="card-user-info">
                <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/DSX.png" alt="DSX" />
                <h2>DSX</h2>

              </div>
              <img class="card-img" src="Image/pick.jpg" alt="pickup" />
              <p>I just recive a new package today.<br> Please help me pick up the package.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="script.js"></script>
</body>

</html>