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
          print_r($targetParcelData);
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
