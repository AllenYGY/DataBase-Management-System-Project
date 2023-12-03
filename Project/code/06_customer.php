<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>user page</title>
  <link rel="stylesheet" href="index.css">

</head>

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

        <li class="nav-item">
          <b></b>
          <b></b>
          <a href="11_search.php">
            <i class="fa fa-search nav-icon"></i>
            <span class="nav-text">Search</span>
          </a>
        </li>

        <li class="nav-item">
          <b></b>
          <b></b>
          <a href="10_viewHistory.php">
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

            <div class="image-container img-one" id="pickimg">
              <img src="/Project/image/pick.jpg" alt="pick">
              <div class="overlay">
                <h3>Pick package</h3>
              </div>
            </div>

            <div class="image-container img-two" id="sendimg">
              <img src="/Project/image/send.jpg" alt="send">
              <div class="overlay">
                <h3>Send package</h3>
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
                  <h1>13</h1>
                  <p>mon</p>
                </div>
                <div class="activity">
                  <h2>Package</h2>
                  <div class="participants">
                  </div>
                </div>
                <button class="btn">Pick</button>
              </div>

              <div class="day-and-activity activity-two">
                <div class="day">
                  <h1>15</h1>
                  <p>wed</p>
                </div>
                <div class="activity">
                  <h2>Package</h2>
                  <div class="participants">

                  </div>
                </div>
                <button class="btn">Pick</button>
              </div>

              <div class="day-and-activity activity-three">
                <div class="day">
                  <h1>17</h1>
                  <p>fri</p>
                </div>
                <div class="activity">
                  <h2>Package</h2>
                  <div class="participants">
                  </div>
                </div>
                <button class="btn">Pick</button>
              </div>

              <div class="day-and-activity activity-four">
                <div class="day">
                  <h1>18</h1>
                  <p>sat</p>
                </div>
                <div class="activity">
                  <h2>Package</h2>
                  <div class="participants">

                  </div>
                </div>
                <button class="btn">Pick</button>
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
                  <td>Allen YGY</td>
                </tr>
                <tr>
                  <td>Phone:</td>
                  <td>1234567890</td>
                </tr>
                <tr>
                  <td>Mail: </td>
                  <td>s230026188@mail.uic.edu.cn</td>
                </tr>
                <tr>
                  <td>Gender:</td>
                  <td>Male</td>
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
        </div>
      </div>

      <div class="pickpart">
        <form action="#" method="POST">
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
        <div class="weekly-schedule">
          <h1>Package status</h1>
          <div class="calendar">
            <div class="day-and-activity activity-one">
              <div class="day">
                <h1>13</h1>
                <p>mon</p>
              </div>
              <div class="activity">
                <h2>Package</h2>
                <div class="participants">
                </div>
              </div>
              <button class="btn">Pick</button>
            </div>

            <div class="day-and-activity activity-two">
              <div class="day">
                <h1>15</h1>
                <p>wed</p>
              </div>
              <div class="activity">
                <h2>Package</h2>
                <div class="participants">

                </div>
              </div>
              <button class="btn">Pick</button>
            </div>

            <div class="day-and-activity activity-three">
              <div class="day">
                <h1>17</h1>
                <p>fri</p>
              </div>
              <div class="activity">
                <h2>Package</h2>
                <div class="participants">
                </div>
              </div>
              <button class="btn">Pick</button>
            </div>

            <div class="day-and-activity activity-four">
              <div class="day">
                <h1>18</h1>
                <p>sat</p>
              </div>
              <div class="activity">
                <h2>Package</h2>
                <div class="participants">
                </div>
              </div>
              <button class="btn">Pick</button>
            </div>
          </div>
        </div>
      </div>

      <div class="sendpart">
        <form action="#" method="POST">
          <h1>Send package</h1><br>
          <div class="form-group">
            <label for="startadr">Mailing Address:</label>
            <input type="text" id="startadr" name="startadr" placeholder="Enter Mailing Address">
          </div>
          <div class="form-group">
            <label for="startadr">Reciving Address:</label>
            <input type="text" id="endadr" name="endadr" placeholder="Enter Reciving Address">
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
            <label for="volumetype">Volume Type:</label>
            <select id="volumetype" name="volumetype">
              <option value="large">Large</option>
              <option value="medium">Medium</option>
              <option value="small">Small</option>
            </select>
          </div>
          <input type="submit" value="Send" id="sendButton">
        </form>

      </div>

      <!-- right-content -->
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

      <div id="popup" class="edit-profile">
        <form action="#" method="POST">
          <div class="form-group">
            <h1>Edit Profile</h1><br>
            <div class="image-icon-1">
              <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/test.jpg" alt="user" />
            </div>
            <label for="usr">Username:</label>
            <input type="text" id="usr" name="usr" placeholder="AllenYGY" autocomplete="username">
          </div>
          <div class="form-group">
            <label for="editpwd">Password:</label>
            <input type="password" id="editpwd" name="editpwd" placeholder="Edit your password" autocomplete="current-password">
          </div>
          <div class="form-group">
            <label for="newPhone">Phone:</label>
            <input type="text" id="newPhone" name="newPhone" placeholder="15377951778">
          </div>
          <div class="form-group">
            <label for="newMail">Mail:</label>
            <input type="text" id="newMail" name="newMail" placeholder="s230026188@mail.uic.edu.cn">
          </div>
          <div class="form-group">
            <label for="newGender">Gender:</label>
            <input type="text" id="newGender" name="newGender" placeholder="Male">
          </div>
          <div class="form-group">
            <label for="newAdr">Address:</label>
            <input type="text" id="newAdr" name="newAdr" placeholder="Edit your Address">
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
  <script src="script.js"></script>
</body>

</html>