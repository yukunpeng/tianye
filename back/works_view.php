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
    <title>查看作品</title>
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
<h1>查看作品</h1>
    <ul>
        <li><a href="news_list.php">新闻管理</a></li>
        <li><a href="works_list.php">作品管理</a></li>
        <li><a href="history_list.php">发展历程</a></li>
        <li><a href="magazine_list.php">内刊管理</a></li>
        <li><a href="banner_list.php">banner管理</a></li>
    </ul>

    <p>
    <a href="works_list.php">返回作品列表</a>
    <a href="works_add.php">添加作品</a>
    <?php
    require_once "../utils/WorksManager.php";
    require_once "../utils/Tools.php";

    $worksManager=new WorksManager();

    echo "<a href='works_edit.php?id=".$_GET["id"]."'>编辑</a><br/>";
    $row = $worksManager->getWorkById($_GET["id"]);

    if($row["_shows"]==1){
        echo "显示中 | ";
    }else{
        echo "隐藏中 | ";
    }
    echo "分类:";

    $type=$row["_type"];
    while($type>10){
        echo $worksManager->getWorkTypeNameByType($type%10).",";
        $type=floor($type/10);
    }
    echo $worksManager->getWorkTypeNameByType($type);
    echo " | ";
    echo $row["_time"];
    ?>
</p>
<p>-----------------------------------</p>
<?php
echo "<h1>".$row["_title"]."</h1>";
echo "<div>缩略图：<img src='".Tools::getThumPicPath($row["_thumPath"])."' class='thum'>"."</div>";
echo "<div class='content'>".$row["_content"]."</div>";
?>
    </div>
</body>
</html>