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
    <h1>CashFlow</h1>
    <?php
    include "03_connectDB.php";
    $sql = "SELECT * from account";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $accounts = array();
        while ($row = $result->fetch_assoc()) {
            $accounts[] = $row;
        }
    }

    echo "<table>";
    echo "<tr> 
        <th>User</th>
        <th>usertype</th>
        <th>FruitTpre</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total Price</th>
        <th>Date</th>
            </tr>";
    $reversedAccounts = array_reverse($accounts);
    foreach ($reversedAccounts as $account) :
        $name = $account['username'];
        echo "<tr>";
        echo "<td>" .$name. "</td>";
        echo "<td>" . $account['usertype'] . "</td>";
        echo "<td>" . $account['fruitType'] . "</td>";
        echo "<td>" . $account['quantity']. "</td>";
        echo "<td>" . $account['price']. "</td>";
        echo "<td>" . $account['total']. "</td>";
        echo "<td>" . $account['date']. "</td>";
        echo "</tr>";
    endforeach;
    $sql1 = "SELECT * from cashflow WHERE account='jpair40'";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_assoc($result1);
        global $cash;
        $cash = $row1['cash'];
    }
    echo "<tr><td colspan='7'>Cash Remaining: " . $cash . " ￥</td>";
    echo "</table>";

    echo " Go back to <a href='08_admin_page.php'>Administrator</a>";
    ?>
</body>

</html>