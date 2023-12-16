<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courier Manager</title>
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

        <li class="nav-item" id="searchNavItem">
          <b></b>
          <b></b>
          <a href="16_search_cadmin.php">
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
        <div class="activities">
          <h1>Activities</h1>
          <div class="activity-container">

            <div class="image-container img-three">
              <!-- id="pickimg"> -->
              <img src="/Project/image/pickup.jpg" alt="pick">
              <div class="overlay">
                <h3>Pick package</h3>
              </div>
            </div>

            <div class="image-container img-four">
              <!-- id="sendimg"> -->
              <img src="/Project/image/delivery.jpg" alt="send">
              <div class="overlay">
                <h3>Send package</h3>
              </div>
            </div>
          </div>
        </div>

        <div class="left-bottom">
          <div class="weekly-schedule">
            <!-- <h1>Package Status</h1> -->
            <?php
            date_default_timezone_set('Asia/Shanghai');
            echo "<div class='calendar'>";
            echo "<h1>Wating for accept</h1>";
            $date = date('d');
            $day = date('D');
            if ($inTransitCount) {
              echo "              
                <div class='day-and-activity activity-one'>
                    <div class='day'>
                      <h1>$date</h1>
                      <p>$day</p>
                    </div>
                    <div class='activity'>
                          <h3>$inTransitCount packages need to be accept</h3>
                    </div>
                    <a href='13_accept_package.php?action=send' class='btn'>Accept</a>
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
                </div>
              ";
            }
            echo "</div>";

            // confirm send
            echo "<div class='calendar'>";
            echo "<h1>Wating for send</h1>";
            $date = date('d');
            $day = date('D');
            if ($pendingCount) {
              echo
              "<div class='day-and-activity activity-two'>
                  <div class='day'>
                    <h1>$date</h1>
                    <p>$day</p>
                  </div>
                  <div class='activity'>
                    <h3>$pendingCount packages need to be send</h3>
                  </div>
                  <a href='12_send_package.php?action=send' class='btn'>Send</a>
                </div>";
            } else {
              echo
              "<div class='day-and-activity activity-two'>
                  <div class='day'>
                    <h1>$date</h1>
                    <p>$day</p>
                  </div>
                  <div class='activity'>
                    <h3> No packages need to be send</h3>
                  </div>
              </div>";
            }
            echo  "</div>";

            ?>
          </div>
          <div class="personal-bests">
            <h1>Courier station status</h1>
            <div class="personal-bests-container">
              <div class="best-item box-one">
                <p>Opening Hours:<br> 7 am. - 10 pm.</p>
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/242bbd8c-aaf8-4aee-a3e4-e0df62d1ab27" alt="" />
              </div>
              <div class="best-item box-one-1">
                <p>Crowded state:<br> Free </p>
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
              <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/test.jpg" alt="user" />
            </div>
            <div class="info-container info-one">
              <table>
                <tr>
                  <td>Name:</td>
                  <td><?php echo $name; ?></td>
                </tr>
                <tr>
                  <td>ManagerID:</td>
                  <td><?php echo $userID; ?></td>
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
                  <td><?php echo $csadr; ?></td>
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

      <!-- pick section -->
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

        </div>
      </div>

      <!-- send section -->

      <div class="sendpart">
        <form action="10_send_parcel.php" method="POST">
          <h1>Send package</h1><br>
          <div class="form-group">
            <label for="startadr">Mailing Address:</label>
            <select id="startadr" name="startadr">
              <option value="UIC">UIC</option>
              <option value="JNU">JNU</option>
              <option value="SYSU">SYSU</option>
              <option value="BNU">BNU</option>
              <option value="BIT">BIT</option>
            </select>
          </div>
          <div class="form-group">
            <label for="startadr">Reciving Address:</label>
            <select id="endadr" name="endadr">
              <option value="UIC">UIC</option>
              <option value="JNU">JNU</option>
              <option value="SYSU">SYSU</option>
              <option value="BNU">BNU</option>
              <option value="BIT">BIT</option>
            </select>
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

      <!-- Search & History section -->
      <div class="search-hitorypart">
        <div class="weekly-schedule">
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
        <form action="09_edit_profile.php" method="POST">
          <div class="form-group">
            <h1>Edit Profile</h1><br>
            <div class="image-icon-1">
              <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/test.jpg" alt="user" />
              <?php echo $name; ?>
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
            <input type="text" id="oldpwd" name="oldpwd" placeholder="Enter you password" required>
          </div>
          <input type="submit" value="Edit" id="editButton">
        </form>
      </div>
    </section>

  </main>
  <script src="script_cadmin.js"></script>
</body>

</html>