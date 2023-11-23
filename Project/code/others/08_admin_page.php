<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="Receipt.css">
</head>

<body>
    <?php
     session_start();
    if($_SESSION["usertype"]!="admin"){
        header('Location:error.html');}
    include "03_connectDB.php";
    $sql = "SELECT * from fruits";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $fruits = array();
        while ($row = $result->fetch_assoc()) {
            $fruits[] = $row;
        }
    }
    echo "<h1>Administrator</h1>";
    echo "<table>";
    echo "<tr> <th>Fruit Type</th>
        <th>Selling Price</th>
        <th>Buying Price</th>
        <th>Inventory</th>
        <th>Status</th>
        <th>Action</th>
    </tr>";
    foreach ($fruits as $fruit) :
        $status = $fruit['status'];
        $fruitType = $fruit['fruitType'];
        echo "<tr>";
        echo "<td>" . $fruit['fruitType'] . "</td>";
        echo "<td>" . $fruit['price'] . "</td>";
        echo "<td>" . $fruit['cost'] . "</td>";
        echo "<td>" . $fruit['inventory'] . "</td>";
        echo "<td>" . $fruit['status'] . "</td>";
        echo "<td><a href='08_changeStatus.php?mid=$status&fruitType=$fruitType'>Change</td>";
        echo "</tr>";
    endforeach;
    $sql1 = "SELECT * from cashflow WHERE account='jpair40'";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_assoc($result1);
        global $cash;
        $cash = $row1['cash'];
    }
    echo "<tr><td colspan='2'>Cash Remaining: " . $cash . " ￥</td>";
    echo "<td colspan='4'><a href='08_cashFlow.php'> Check CashFlow </td> </tr>";
    echo "</table>";
    ?>
    <form method="post">
        <table>
            <tr>
                <td><label for="fruitType">Fruit Type:</label></td>
                <td><input type="text" name="fruitType" id="fruitType" required></td>
            </tr>
            <tr>
                <td><label for="Price">Selling Price:</label></td>
                <td><input type="number" step="any" min="0"name="Price" id="Price" ></td>
            </tr>
            <tr>
                <td><label for="Cost">Buying Price:</label></td>
                <td><input type="number" step="any"min="0" name="Cost" id="Cost"></td>
            </tr>
            <tr>
                <td><label for="Inventory">Inventory:</label></td>
                <td><input type="number" step="any" min="0"name="Inventory" id="Inventory"></td>
            </tr>
            <tr>
                <td><label for="url">url</label></td>
                <td><input type="text" name="url" id="url"></td>
            </tr>
            <tr>
                <td colspan="1"><input type="submit" value="Update"  formaction="08_updatePrices.php"></td>
                <td colspan="1"><input type="submit" value="Addfruit" formaction="08_addFruit.php" ></td>
            </tr>
        </table>
        <?php
        $today = date("Y-m-d");
        echo $today;
        ?>
    </form>
</body>

</html>