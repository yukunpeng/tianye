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
    <title>作品列表</title>
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
<h1>作品管理</h1>
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
        <td>完成时间</td>
        <td>操作</td>
        <td>分类</td>
    </tr>
    <?php
    require_once "../utils/WorksManager.php";
    require_once "../utils/Tools.php";

    $curPage=1;
    $worksManager=new WorksManager();

    if(isset($_GET["page"])){
        $curPage=$_GET["page"];
    }
    $result = $worksManager->getWorksListByPage($curPage,true,1000);
    while($row=mysql_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$row["_id"]."</td>";

        echo "<td>".$row["_sort"]."</td>";
        echo "<td><a href='works_view.php?id=" .$row["_id"]."'>".$row["_title"]."</a></td>";
        echo "<td><img src='".Tools::getThumPicPath($row['_thumPath'])."' class='thum'></td>";
        echo "<td>".$row["_time"]."</td>";
        echo "<td>";
        echo "<a href='works_edit.php?id=".$row["_id"]."'>编辑</a> ";
        if($row["_shows"]==1){
            echo "<a href='../utils/operaBack.php?cmd=10&page=$curPage&id=".$row["_id"]."&shows=0'>显示中</a> ";
        }else{
            echo "<a href='../utils/operaBack.php?cmd=10&page=$curPage&id=".$row["_id"]."&shows=1'>隐藏中</a> ";
        }
        echo "<a href='../utils/operaBack.php?cmd=12&id=".$row["_id"]."' onclick='return isDel()'>删除</a> ";
        if($row["_recommend"]==1){
            echo "<a href='../utils/operaBack.php?page=$curPage&shows=0&cmd=16&id=".$row["_id"]."'>首页显示中</a> ";
            echo "<a href='#'></a> ";
        }else{
            echo "<a href='../utils/operaBack.php?page=$curPage&shows=1&cmd=16&id=".$row["_id"]."'>首页隐藏中</a> ";
        }
        echo "</td>";
        //echo "<td>".$worksManager->getWorkTypeNameByType($row["_type"])."</td>";
        echo "<td>";
        $type=$row["_type"];
        while($type>10){
            echo $worksManager->getWorkTypeNameByType($type%10).",";
            $type=floor($type/10);
        }
        echo $worksManager->getWorkTypeNameByType($type);
        echo "</td>";
        echo "</tr>";
    }
    ?>
    <tr>
        <td><a href="works_add.php">添加作品</a></td>
    </tr>
</table>
<?php
$sumPage=$worksManager->getWorksSumPage(true,1000);
$prePage=$curPage-1;
$nextPage=$curPage+1;
if($prePage<=0)$prePage=1;
if($nextPage>$sumPage)$nextPage=$sumPage;

echo "<a href='works_list.php?page=1'>首页</a>,";
echo "<a href='works_list.php?page=$prePage'>上一页</a>,";
echo "第 $curPage 页,";
echo "共 $sumPage 页,";
echo "<a href='works_list.php?page=$nextPage'>下一页</a>,";
echo "<a href='works_list.php?page=$sumPage'>尾页</a>";
?>
    </div>
</body>
</html>