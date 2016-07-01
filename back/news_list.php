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
    <title>新闻列表</title>
    <script src="../active/jquery-2.2.0.js"></script>
    <script>

    </script>
    <style>
        *{
            border: none;
        }
        table{
            border: 2px solid red;
            padding: 5px;
        }
        tr{
            background-color: #bbb;
            margin: 5px 0;
        }
        tr:hover{
            background-color: #008200;
        }
        td{
            text-align: left;
            padding: 5px;
        }
        .thum{
            width: 100px;
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
<h1>新闻管理</h1>
    <ul>
        <li><a href="news_list.php">新闻管理</a></li>
        <li><a href="works_list.php">作品管理</a></li>
        <li><a href="history_list.php">发展历程</a></li>
        <li><a href="magazine_list.php">内刊管理</a></li>
        <li><a href="banner_list.php">banner管理</a></li>
    </ul>
<a href="function_list.php">返回</a>
<table>
    <tr>
        <td>id</td>
        <td>排序</td>
        <td>新闻标题</td>
        <td>缩略图</td>
        <td>新闻时间</td>
        <td>操作</td>
        <td>分类</td>
    </tr>
    <?php
    require_once "../utils/NewsManager.php";
    require_once "../utils/Tools.php";

    $newsManager=new NewsManager();
    $curPage=1;
    if(isset($_GET["page"])){
        $curPage=$_GET["page"];
    }
    $result = $newsManager->getNewsListByPage($curPage,true);
    while($row=mysql_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$row["_id"]."</td>";
        echo "<td>".$row["_sort"]."</td>";
        echo "<td><a href='news_view.php?id=" .$row["_id"]."'>".$row["_title"]."</a></td>";
        echo "<td><img src='".Tools::getThumPicPath($row['_thumPath'])."' class='thum'></td>";
        echo "<td>".$row["_time"]."</td>";
        echo "<td>";
        echo "<a href='news_edit.php?id=".$row["_id"]."'>编辑</a> ";
        if($row["_shows"]==1){
            echo "<a href='../utils/operaBack.php?cmd=4&page=$curPage&id=".$row["_id"]."&shows=0'>显示中</a> ";
        }else{
            echo "<a href='../utils/operaBack.php?cmd=4&page=$curPage&id=".$row["_id"]."&shows=1'>隐藏中</a> ";
        }
        echo "<a href='../utils/operaBack.php?cmd=2&id=".$row["_id"]."' onclick='return isDel()'>删除</a> ";
        echo "</td>";
        echo "<td>".$newsManager->getNewTypeNameByType($row["_type"])."</td>";
        echo "</tr>";
    }
    ?>
    <tr>
        <td><a href="news_add.php">添加新闻</a></td>
    </tr>
</table>
<?php
$sumPage=$newsManager->getNewsSumPage(true);
$prePage=$curPage-1;
$nextPage=$curPage+1;
if($prePage<=0)$prePage=1;
if($nextPage>$sumPage)$nextPage=$sumPage;

echo "<a href='news_list.php?page=1'>首页</a>,";
echo "<a href='news_list.php?page=$prePage'>上一页</a>,";
echo"第 $curPage 页,";
echo "共 $sumPage 页,";
echo "<a href='news_list.php?page=$nextPage'>下一页</a>,";
echo "<a href='news_list.php?page=$sumPage'>尾页</a>";
?>
    </div>
</body>
</html>