<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link rel="stylesheet" href="Receipt.css">
</head>

<body>
    <h1>Receipt</h1>
    <?php
    include "03_connectDB.php";
    $sql = "SELECT * from fruits WHERE status='Available'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $fruits = array();
        while ($row = $result->fetch_assoc()) {
            $fruits[] = $row;
        }
    }
    session_start();
    // 从 $_SESSION 中获取 $user 变量
    $user = $_SESSION["user"];

    foreach ($fruits as $fruit) :
        global $name, $temp, $inventory, $record;
        $name = $fruit['fruitType'];
        $inventory = $fruit['inventory'];
        $record = 1;
        if (empty($_POST[$name])) {
            $temp = 0;
        } else {
            $temp  = $_POST[$name];
        }
        $sumPrice += ($temp * $fruit['price']);
    endforeach;

    $sql1 = "SELECT * from cashflow WHERE account='jpair40'";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_assoc($result1);
        global $cash;
        $cash = $row1['cash'];
    }

    if ($sumPrice > $cash) {
        echo "We don't have enough money to buy your fruits.";
        $record = 0;
        echo " Go back to continue <a href='07_fruit_store_seller.php'>Sell!</a>";
    }
    $sumPrice = 0;
    if ($record == 1) {
        echo "<table>";
        echo "<tr> 
        <th>Fruit Type</th>
        <th>Quantity</th>
        <th>Unit price</th>
        <th>Transaction date</th>
            </tr>";
        foreach ($fruits as $fruit) :
            $today = date("Y-m-d");
            $name = $fruit['fruitType'];
            $inventory = $fruit['inventory'];

            if (empty($_POST[$name])) {
                // echo "!!!!!!<br>";
                $temp = 0;
            } else {
                $temp  = $_POST[$name];
            }
            $sumPrice += ($temp * $fruit['price']);
            if ($temp != 0) {
                echo "<tr>";
                echo "<td>" . $fruit['fruitType'] . "</td>";
                echo "<td>" . $temp . "</td>";
                echo "<td>" . $fruit['cost'] . "</td>";
                echo "<td>".$today."</td>";
                echo "</tr>";
                $fruitType=$fruit['fruitType'];
                $price=$fruit['price'];
                $total=$temp*$price;
                $result = (float)($inventory + $temp);
                $sql = "UPDATE fruits SET inventory= '$result' WHERE fruitType='$name';";
                $result = mysqli_query($conn, $sql);
                $sql2="INSERT INTO account (username, usertype, fruitType,quantity,price,date,total)VALUES ('$user', 'seller','$fruitType',$temp,$price,'$today',$total);";
                $result2 = mysqli_query($conn, $sql2);
            }
        endforeach;
        echo "<tr><td colspan='4'>Total price:" . $sumPrice . "￥<br></td></tr>";
        echo "</table>";
        $sql = "UPDATE cashflow SET cash=$cash-$sumPrice  WHERE account='jpair40';";
        $result = mysqli_query($conn, $sql);
        echo " Go back to continue <a href='07_fruit_store_seller.php'>Sell!</a>";
    }
    ?>
</body>

</html>