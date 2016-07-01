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
    <title>修改内刊</title>

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

<h1>修改内刊</h1>
    <ul>
        <li><a href="news_list.php">新闻管理</a></li>
        <li><a href="works_list.php">作品管理</a></li>
        <li><a href="history_list.php">发展历程</a></li>
        <li><a href="magazine_list.php">内刊管理</a></li>
        <li><a href="banner_list.php">banner管理</a></li>
    </ul>

    <form method="post" action="../utils/operaBack.php" enctype="multipart/form-data" >
    <input name="cmd" value="22" type="hidden">
    <?php
    echo "<input name='id' value='".$_GET["id"]."' type='hidden'>";

    require_once "../utils/MagazineManager.php";
    require_once "../utils/Tools.php";

    $magazineManager=new MagazineManager();
    $result = $magazineManager->getMagazineById($_GET["id"]);
    $row=mysql_fetch_array($result);
    $thum=$row["_thum"];
    $thumPathArr=explode("|_|",$row["_content"]);

    echo "<h3>标题：<input type='text' name='title' value='".$row["_title"]."'></h3>";
    echo "<h3>年份：<input type='text' name='year' value='".$row["_year"]."'>(例如2016，不可有别的多余字符)</h3>";

    ?>
    <ul>
        <li>
            <label>缩略图(宽174*高256)：</label><input type='file' name='page0' accept='image/png,image/gif,image/jpg,image/jpeg'>
            <?php
            echo "<img src='".$thum."'>";
            ?>
        </li>
        <li>
            <label>第1页：</label>
            <input type="file" name="page1" accept="image/png,image/gif,image/jpg,image/jpeg">
            <?php
            echo "<img src='".$thumPathArr[0]."'>";
            ?>
        </li>
        <li>
            <label>第2页：</label>
            <input type="file" name="page2" accept="image/png,image/gif,image/jpg,image/jpeg">
            <?php
            echo "<img src='".$thumPathArr[1]."'>";
            ?>
        </li>
        <li>
            <label>第3页：</label>
            <input type="file" name="page3" accept="image/png,image/gif,image/jpg,image/jpeg">
            <?php
            echo "<img src='".$thumPathArr[2]."'>";
            ?>
        </li>
        <li>
            <label>第4页：</label>
            <input type="file" name="page4" accept="image/png,image/gif,image/jpg,image/jpeg">
            <?php
            echo "<img src='".$thumPathArr[3]."'>";
            ?>
        </li>
    </ul>

    <input value="提交" type="submit" id="submitBtn">
    <a href="magazine_list.php">取消</a>
</form>
</div>
</body>
</html>
