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
    <title>banner列表</title>

    <script charset="utf-8" src="../ed/kindeditor-all-min.js"></script>
    <script charset="utf-8" src="../ed/lang/zh-CN.js"></script>
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
    <script>
        function isDel(){
            return confirm('确定删除吗 ?');
        }
    </script>
</head>
<body>
<div id="wrap">

<h1>banner列表</h1>
    <ul>
        <li><a href="news_list.php">新闻管理</a></li>
        <li><a href="works_list.php">作品管理</a></li>
        <li><a href="history_list.php">发展历程</a></li>
        <li><a href="magazine_list.php">内刊管理</a></li>
        <li><a href="banner_list.php">banner管理</a></li>
    </ul>

    <a href="function_list.php">返回</a>

<form method="post" action="../utils/operaBack.php">
    <table>
        <?php
        require_once "../utils/BannerManager.php";
        require_once "../utils/Tools.php";

        $bannerManager=new BannerManager();
        $result = $bannerManager->getBannerList();

        while($row=mysql_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row["_title"]."</td>";
            echo "<td><a href='../utils/operaBack.php?cmd=24&id=".$row["_id"]."' onclick='return isDel()'>删除</a> ";
            echo "<a href='banner_edit.php?id=".$row["_id"]."'>修改</a></td></tr>";
        }
        ?>
        <tr>
            <td><a href="banner_add.php">添加</a></td>
        </tr>
    </table>
</form>


</div>
</body>
</html>
