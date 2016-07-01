<?php
session_start();
if(!isset($_SESSION["isLogin"])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv = "Content-Type" content = "text/html;charset=UTF-8">
    <title>banner添加</title>

    <script src="../active/jquery-2.2.0.js"></script>
    <script>
    </script>
    <style>
        #titleTxt{
            width: 900px;
            height: 30px;
            font-size: 20px;
            line-height: 30px;
            margin: 20px;
            text-align: center;
        }
        #wrap{
            width: 1000px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div id="wrap">

<h1>banner添加</h1>
    <ul>
        <li><a href="news_list.php">新闻管理</a></li>
        <li><a href="works_list.php">作品管理</a></li>
        <li><a href="history_list.php">发展历程</a></li>
        <li><a href="magazine_list.php">内刊管理</a></li>
        <li><a href="banner_list.php">banner管理</a></li>
    </ul>

    <form method="post" action="../utils/operaBack.php" enctype="multipart/form-data" >
    <input name="cmd" value="23" type="hidden">

    <h3>标题：<input type="text" name="title"></h3>
    <ul>
        <li><label>显示：</label><input type="checkbox" name="show"></li>
        <li><label>图片(1920*320)：</label><input type="file" name="pic" accept="image/png,image/gif,image/jpg,image/jpeg"></li>
        <li><label>跳转地址：</label><input type="text" name="url"></li>
    </ul>

    <input value="提交" type="submit" id="submitBtn">
    <a href="banner_list.php">取消</a>
</form>
</div>
</body>
</html>
