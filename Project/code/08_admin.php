<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrator</title>
  <link rel="stylesheet" href="index.css">
</head>

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

            <div class="image-container img-five">
              <img src="/Project/image/station.png" alt="station" />
              <div class="overlay">
                <h3>Courier</h3>
              </div>
            </div>

            <div class="image-container img-six">
              <img src="/Project/image/station.png" alt="station" />
              <div class="overlay">
                <h3>Courier</h3>
              </div>
            </div>

            <div class="image-container img-seven">
              <img src="/Project/image/station.png" alt="station" />
              <div class="overlay">
                <h3>Courier</h3>
              </div>
            </div>

            <div class="image-container img-eight">
              <img src="/Project/image/station.png" alt="station" />
              <div class="overlay">
                <h3>Courier</h3>
              </div>
            </div>


            <div class="image-container img-nine">
              <img src="/Project/image/station.png" alt="station" />
              <div class="overlay">
                <h3>Courier</h3>
              </div>
            </div>

            <div class="image-container img-ten">
              <img src="/Project/image/station.png" alt="station" />
              <div class="overlay">
                <h3>Courier</h3>
              </div>
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
              <p>I just recive a new package today.<br> Please help me pick up the package.</p>
            </div>

            <div class="card card-two">
              <div class="card-user-info">
                <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/DSX.png" alt="DSX" />
                <h2>DSX</h2>

              </div>
              <img class="card-img" src="/Project/image/pick.jpg" alt="pickup" />
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