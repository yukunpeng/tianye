<?php
session_start();
if(isset($_SESSION["isLogin"])){
    header("Location: ../back/function_list.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>田野文化后台登录</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background: url(../asset/login_bg.png);
            font-family: "sans serif", tahoma, verdana, helvetica;
        }
        form{
            width: 300px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px 10px;
            position: absolute;
            margin-left: -150px;
            margin-top: -120px;
            left: 50%;
            top: 50%;
            font-size: 12px;
            border: 2px solid #C5D7FD;
        }
        .title{
            text-align: center;
            margin: 10px 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #C5D7FD;
        }
        ul{
            list-style-type: none;
        }
        li{
            padding: 10px 0;
        }
        li label{
            display: inline-block;
            width:80px;
            text-align: right;
        }
        .txt{
            border: 1px solid #999;
            padding: 5px 2px;
            background-color: #E2EBFE;
        }
        .submit{
            padding: 5px 20px;
        }
        span{
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<form method="post" action="../utils/operaBack.php">
    <input name="cmd" value="6" type="hidden">
    <h3 class="title">田野文化后台管理系统</h3>
    <ul>
        <li>
            <label for="userName">用户名：</label>
            <input type="text" name="userName" id="userName" placeholder="用户名" class="txt">
        </li>
        <li>
            <label for="passWord">密码：</label>
            <input type="password" name="passWord" id="passWord" placeholder="密码" class="txt">
        </li>
        <li>
            <label></label>
            <input type="submit" value="登录" class="submit">
            <?php
            if(isset($_GET["isWrong"])){
                echo "<span>用户名或密码错误</span>";
            }
            ?>
        </li>
    </ul>
</form>
</body>
</html>