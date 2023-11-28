<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.11/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
<!-- 引入样式 -->
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<!-- 引入组件库 -->
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <title>Main Page</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="navbar" id="navbar">
        <ul>
            <li><a href="00_index.php" class="a1">Home</a></li>
            <li><a href="#" class="a2">Search</a></li>
            <li><a href="#" class="a2">Pacakage Status</a></li>
            <li><a href="#" class="a2">History</a></li>
            <li><a href="01_login.php" class="a2">Login</a></li>
            <li><a href="02_register.php" class="a2">Sign Up</a></li>
        </ul>
    </div>
    <div class="sidebar" id="sidebar">
        <ul>
            <li>
                <a href="00_index.php">
                    <img src="https://cdn.jsdelivr.net/gh/ALLENYGY/ImageSpace@master/IMAGE/DBM/home.png" alt="Home" />
                    <span class="text">Home</span>
                </a>
            </li>
            <li><a href="#">Search</a></li>
            <li><a href="#">Status</a></li>
            <li><a href="#">History</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="images-wrapper">
            <div class="image-container">
                <img src="/Project/image/pick.png" alt="Pick" />
                <button id="normalBtn">Pick</button>
            </div>
            <div class="image-container">
                <img src="/Project/image/send.png" alt="Send" />
                <button id="normalBtn">Send</button>
            </div>
        </div>
        <button id="toggleBtn">Toggle</button>

    </div>
    <script src="script.js"></script>
</body>

</html>