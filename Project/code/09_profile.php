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
            <i class="fa fa-search nav-icon"></i>
            <span class="nav-text">Search</span>
          </a>
        </li>

        <li class="nav-item">
          <b></b>
          <b></b>
          <a href="11_viewHistory.php">
            <i class="fa fa-history nav-icon"></i>
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
            <i class="fa fa-sign-out nav-icon"></i>
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
                  <td><strong>Password: </strong></td>
                  <td>*********</td>
                </tr>
                <tr>
                  <td><strong>Phone: </strong></td>
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
              <button class="btn" id="openPop">Edit</button>
            </div>
          </div>
        </div>
        <div class="left-bottom">
          <div class="weekly-schedule">
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
                    <h2>大师兄</h2>
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
    </section>
  </main>

  <div id="popup" class="popup">
    <div class="pop-content">
      <span class="close">&times;</span>
      <!-- Your form or content for editing -->
      <h2>Edit Profile</h2>
      <form>
        <label for="newName">Name:</label>
        <input type="text" id="newName" name="newName">
        <input type="submit" value="Save">
      </form> 
    </div>
   </div>
  <script src="script.js"></script>
</body>

</html>

 