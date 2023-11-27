<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            font-weight: 520;
            font-family: 'Times New Roman', Times, serif;
        }
 
        #nav {
            width: 1470px;
            height: 72px;
            background-color: rgb(247, 249, 250);
            border-radius: 20px;
            margin: 20px auto;
        }
 
        #nav>ul>li {
            float: left;
            width: 175.75px;
            height: 72px;
            text-align: center;
        }
 
        #nav>ul>li>a {
            text-align: center;
            line-height: 72px;
            font-size: 20px;
            color: black;
        }
 
        #nav>ul>li>a:hover {
            color: orange;
        }
 
        ul>span {
            float: left;
            line-height: 72px;
            color: rgb(225, 224, 224);
            font-weight: 800;
            font-size: 24px;
        }
 
        #nav>ul>li>.a1 {
            color: #FF0036;
        }
 
        #nav>ul>li>.a2 {
            color: rgb(101, 198, 58);
        }
    </style>
</head>
 
<body>
    <div id="nav">
        <ul>
            <li><a href="#" class="a1">aaaa</a></li><span>|</span>
            <li><a href="#" class="a1">bbbb</a></li><span>|</span>
            <li><a href="#" class="a2">cccc</a></li><span>|</span>
            <li><a href="#"></a>dddd</li><span>|</span>
            <li><a href="#"></a>gggg</li><span>|</span>
            <li><a href="#"></a>hhhh</li>
            <li><a href="Project/code/01_login.php" class="a2">Login</a></li><span>|</span>
            <li><a href="Project/code/02_register.php" class="a2">Sign Up</a></li><span>|</span>
            <!-- <li><a href="01_login.php"  class="a1"></a>Login</li><span>|</span> -->
            <!-- <li><a href="02_register.php" class="a1"></a>Sign up</li><span>|</span> -->
        </ul>
    </div>
</body>
 
</html>