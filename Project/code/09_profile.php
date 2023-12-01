<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>user page</title>
  <link rel="stylesheet" href="profile.css">

</head>

<body>
  <main>
    <nav class="main-menu">
      <h1>Courier Station</h1>
      <img class="logo" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/4cfdcb5a-0137-4457-8be1-6e7bd1f29ebb" alt="" />
      <ul>
        <li class="nav-item">
          <b></b>
          <b></b>
          <a href="06_customer.php">
            <i class="fa fa-house nav-icon"></i>
            <span class="nav-text">Home</span>
          </a>
        </li>

        <li class="nav-item active">
          <b></b>
          <b></b>
          <a href="09_profile.php">
            <i class="fa fa-user nav-icon"></i>
            <span class="nav-text">Profile</span>
          </a>
        </li>

        <li class="nav-item">
          <b></b>
          <b></b>
          <a href="#">
            <i class="fa fa-calendar-check nav-icon"></i>
            <span class="nav-text">Search</span>
          </a>
        </li>

        <li class="nav-item">
          <b></b>
          <b></b>
          <a href="#">
            <!-- <i class="fa fa-person-running nav-icon"></i> -->
            <i class="fa fa-calendar-check nav-icon"></i>
            <span class="nav-text">History</span>
          </a>
        </li>

        <li class="nav-item">
          <b></b>
          <b></b>
          <a href="#">
            <i class="fa fa-sliders nav-icon"></i>
            <span class="nav-text">Settings</span>
          </a>
        </li>

        <li class="nav-item">
          <b></b>
          <b></b>
          <a href="01_login.php">
            <i class="fa fa-sliders nav-icon"></i>
            <span class="nav-text">Log out</span>
          </a>
        </li>

      </ul>
    </nav>

    <section class="content">
      <div class="left-content">
        <div class="activities">
          <h1>User Information</h1>
          <div class="activity-container">

            <div class="image-container img-one">
              <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/test.jpg" alt="user" />
              <div class="overlay">
                <h3>set profile picture</h3>
              </div>
            </div>
            <div class="image-container info-one">
              <table style="font-size: 28px; color: #333;">
                <tr>
                  <td><strong>Name: </strong></td>
                  <td>Allen YGY</td>
                </tr>
                <tr>
                  <td><strong>Password:        </strong></td>
                  <td>*********</td>
                </tr>
                <tr>
                  <td><strong>Phone:       </strong></td>
                  <td>+1234567890</td>
                </tr>
                <tr>
                  <td><strong>Mail: </strong></td>
                  <td>s230026188@mail.uic.edu.cn</td>
                </tr>
                <tr>
                  <td><strong>Gender: </strong></td>
                  <td>Male</td>
                </tr>
                <tr>
                  <td><strong>Address: </strong></td>
                  <td>123 Main Street, City, Country</td>
                </tr>
              </table>
              <button class="btn"> Change</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="script.js"></script>
</body>

</html>
