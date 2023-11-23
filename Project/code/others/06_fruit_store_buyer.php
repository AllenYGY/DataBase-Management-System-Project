<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include "03_connectDB.php";
    $sql = "SELECT * from fruits where STATUS = 'Available'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $fruits = array();
        while ($row = $result->fetch_assoc()) {
            $fruits[] = $row;
        }
    }

    // 关闭数据库连接
    $conn->close();
    session_start();
    if($_SESSION["usertype"]!="buyer"){
        header('Location:error.html');
    }
    ?>
    <div class="tips clearfix" id="tips">
    </div>
    <div class="nav">
        <ul class="clearfix">
            <li><a onclick="showGoods()">Goods</a></li>
            <li><a onclick="showCart()">Shopping cart</a></li>
        </ul>
    </div>
    <div id="chart" class="chart clearfix">
        <div class="line">
            <h2>My cart</h2>
        </div>
        <form action="09_buy_result.php" method="POST">
            <div id="add">
            </div>
            <div class="chart_buy">
                <button type="submit">purchase</button>
            </div>
        </form>
    </div>
    <div class="goods" id="goods">
        <div class="line">
            <h2>Fruit on shops</h2>
        </div>
        <div class="clearfix">
            <?php foreach ($fruits as $fruit) : ?>
                <div class="card">
                    <div class="card_content">
                        <div class="card_content_img">
                            <img src="<?php echo $fruit['url']; ?>">
                        </div>
                        <div class="card_content_others">
                            <h1><?php echo $fruit['fruitType']; ?></h1>
                            <div class="card_content_others_money">
                                <span><?php echo $fruit['price']; ?></span>
                                <strong>￥/kg</strong>
                            </div>
                            <div class="card_content_others_buy">
                                <a onclick="Add('<?php echo $fruit['fruitType']; ?>','<?php echo $fruit['url']; ?>','<?php echo $fruit['price']; ?>') ">Add</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        document.getElementById("goods").style.display = "block";
        document.getElementById("chart").style.display = "None";
        document.getElementById("tips").style.display = "None";
        let shoppinglist = {};
        let img = {

        }
        let pric = {

        }

        function clearTips() {
            document.getElementById("tips").style.display = "None";
        }

        function Add(p, url, price) {
            if (shoppinglist[p]) {
                img[p] = url;
                pric[p] = price;
                shoppinglist[p] += 1;
            } else {
                img[p] = url;
                pric[p] = price;
                shoppinglist[p] = 1;
            }
            document.getElementById("tips").innerHTML = "<p>" + p + " add successfully</p>"
            document.getElementById("tips").style.display = "block";
            setTimeout(clearTips, 2000);
        }

        function showGoods() {
            document.getElementById("goods").style.display = "block";
            document.getElementById("chart").style.display = "None";
        }

        function showCart() {
            document.getElementById("goods").style.display = "None";

            document.getElementById("chart").style.display = "block";
            var add = document.getElementById("add");
            var cnt = 0
            var str = "";
            for (let i in shoppinglist) {
                cnt++;
                str += `<div class="chart_main clearfix">
                <div class="chart_main_detail">
                    <h2>${i}</h2>
                </div>
                <div class="chart_main_img"><img src="${img[i]}"></div>
                <div class="chart_main_num">
                    <input type="number" step="any"  id="fruit-type" name="${i}" min="0" value="${shoppinglist[i]}"><br>
                </div>
                <div class="chart_main_total">
                    <h2>price:${parseInt(pric[i])}￥/kg</h2>
                </div>    
            </div>
            `
            }
            add.innerHTML = str;
        }
    </script>
</body>