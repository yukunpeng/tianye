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
    <title>添加内刊</title>

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

<h1>添加内刊</h1>
    <ul>
        <li><a href="news_list.php">新闻管理</a></li>
        <li><a href="works_list.php">作品管理</a></li>
        <li><a href="history_list.php">发展历程</a></li>
        <li><a href="magazine_list.php">内刊管理</a></li>
        <li><a href="banner_list.php">banner管理</a></li>
    </ul>

    <form method="post" action="../utils/operaBack.php" enctype="multipart/form-data" >
    <input name="cmd" value="20" type="hidden">
        <h3>标题：<input type="text" name="title"></h3>
        <h3>年份：<input type="text" name="year">(例如2016，不可有别的多余字符)</h3>
    <ul>
        <li><label>缩略图(宽174*高256)：</label><input type="file" name="page0" accept="image/png,image/gif,image/jpg,image/jpeg"></li>
        <li><label>第1页：</label><input type="file" name="page1" accept="image/png,image/gif,image/jpg,image/jpeg"></li>
        <li><label>第2页：</label><input type="file" name="page2" accept="image/png,image/gif,image/jpg,image/jpeg"></li>
        <li><label>第3页：</label><input type="file" name="page3" accept="image/png,image/gif,image/jpg,image/jpeg"></li>
        <li><label>第4页：</label><input type="file" name="page4" accept="image/png,image/gif,image/jpg,image/jpeg"></li>
    </ul>

    <input value="提交" type="submit" id="submitBtn">
    <a href="magazine_list.php">取消</a>
</form>
</div>
</body>
</html>
