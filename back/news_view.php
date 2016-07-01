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
    <title>查看新闻</title>
    <script src="../active/jquery-2.2.0.js"></script>
    <style>
        .thum{
            width: 100px;
        }
        #wrap{
            width: 1000px;
            margin: 0 auto;
        }
        .content{
            width: 1000px;
        }
        .content img{
            max-width: 100%;
        }
    </style>
</head>
<body>
<div id="wrap">
<h1>查看新闻</h1>
    <ul>
        <li><a href="news_list.php">新闻管理</a></li>
        <li><a href="works_list.php">作品管理</a></li>
        <li><a href="history_list.php">发展历程</a></li>
        <li><a href="magazine_list.php">内刊管理</a></li>
        <li><a href="banner_list.php">banner管理</a></li>
    </ul>

    <p>
    <a href="news_list.php">返回新闻列表</a>
    <a href="news_add.php">添加新闻</a>
    <?php
    require_once "../utils/NewsManager.php";
    require_once "../utils/Tools.php";
    $newsManager=new NewsManager();
    echo "<a href='news_edit.php?id=".$_GET["id"]."'>编辑</a><br/>";

    $row = $newsManager->getNewById($_GET["id"]);

    if($row["_shows"]==1){
        echo "显示中 | ";
    }else{
        echo "隐藏中 | ";
    }
    echo "分类:".$newsManager->getNewTypeNameByType($row["_type"])." | ";
    echo $row["_time"];
    ?>
</p>
<p>-----------------------------------</p>
<?php
echo "<h1>".$row["_title"]."</h1>";
echo "<div>缩略图：<img src='".Tools::getThumPicPath($row["_thumPath"])."' class='thum'>"."</div>";
echo "<div>摘要：".$row["_desc"]."</div>";
echo "<p>-------------------------</p>正文<p>-------------------------</p>";
echo "<div class='content'>".$row["_content"]."</div>";
?>
</div>
</body>
</html>