<?php
session_start();
if(!isset($_SESSION["isLogin"])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>功能列表</title>
    <style>
        *{
            border: none;
        }

        #wrap{
            width: 1000px;
            margin: 0 auto;
        }

        #wrap li{
            margin: 20px 0;
        }
    </style>
</head>
<body>
<div id="wrap">
    <h1>功能列表</h1>
    <ul>
        <li><a href="news_list.php">新闻管理</a></li>
        <li><a href="works_list.php">作品管理</a></li>
        <li><a href="history_list.php">发展历程</a></li>
        <li><a href="magazine_list.php">内刊管理</a></li>
        <li><a href="banner_list.php">banner管理</a></li>
    </ul>
</div>
</body>
</html>