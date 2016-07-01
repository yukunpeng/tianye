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
    <title>banner编辑</title>

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

<h1>banner编辑</h1>
    <ul>
        <li><a href="news_list.php">新闻管理</a></li>
        <li><a href="works_list.php">作品管理</a></li>
        <li><a href="history_list.php">发展历程</a></li>
        <li><a href="magazine_list.php">内刊管理</a></li>
        <li><a href="banner_list.php">banner管理</a></li>
    </ul>

    <form method="post" action="../utils/operaBack.php" enctype="multipart/form-data" >
    <input name="cmd" value="25" type="hidden">
    <?php
    echo "<input name='id' value='".$_GET["id"]."' type='hidden'>";
    require_once "../utils/BannerManager.php";
    require_once "../utils/Tools.php";

    $bannerManager=new BannerManager();
    $result = $bannerManager->getBannerById($_GET["id"]);
    $row=mysql_fetch_array($result);
    echo "<h3>标题：<input type='text' name='title' value='".$row["_title"]."'></h3>";
    echo "<ul>";
    if($row["_show"]==1){
        echo "<li>显示:<input type='checkbox' name='show' checked></li>";
    }else{
        echo "<li>显示:<input type='checkbox' name='show'></li>";
    }
    echo "<li>当前图片:<br /><img src='".$row['_picpath']."'></li>";
    echo "<li>更改图片(1920*320)：<input type='file' name='pic' accept='image/png,image/gif,image/jpg,image/jpeg'></li>";
    echo "<li>跳转地址：<input type='text' name='url' value='".$row["_url"]."'></li>";
    echo "</ul>";
    ?>
    <input value="提交" type="submit" id="submitBtn">
    <a href="banner_list.php">取消</a>
</form>
</div>
</body>
</html>
