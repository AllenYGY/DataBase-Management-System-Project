<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="index.css">

</head>

<body>
  <?php
  session_start();
  $allData = $_SESSION["allData"];

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['parcelID'])) {
      $targetParcelID = $_GET['parcelID'];
      $flag = 0;
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
      </div>
      ";
            $flag = 1;
            break;
          }
        }
        if ($flag == 0) {
          echo "Package Not Found!";
        }
      }
    }
    if (isset($_GET['pstatus']) || (isset($_GET['start_date']) && isset($_GET['end_date']))) {
      // 处理用户输入数据
      $parcelID = $_GET['parcelID'];
      $pstatus = $_GET['pstatus'];
      $startDate = $_GET['start_date'];
      $endDate = $_GET['end_date'];

      // 根据筛选条件过滤已提取的用户包裹信息
      // $filteredParcels = array_filter($userParcels, function ($parcel) use ($parcelID, $pstatus, $startDate, $endDate) {
      //   $matches = true;
      //   if (!empty($parcelID)) {
      //     $matches = $matches && ($parcel['parcelID'] == $parcelID);
      //   }
      //   if (!empty($pstatus)) {
      //     $matches = $matches && ($parcel['status'] == $pstatus);
      //   }
      //   if (!empty($startDate) && !empty($endDate)) {
      //     // 假设 send_time 是包裹信息中的日期时间字段
      //     $parcelDate = date('Y-m-d', strtotime($parcel['send_time']));
      //     $matches = $matches && ($parcelDate >= $startDate && $parcelDate <= $endDate);
      //   }
      //   return $matches;
      // });

      // 输出筛选后的包裹信息
      // print_r($filteredParcels);
      // 或者根据筛选后的包裹信息进行其他操作
    }
  }


  ?>
</body>

</html>