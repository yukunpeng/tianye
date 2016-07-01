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
    <title>修改新闻</title>
    <script charset="utf-8" src="../ed/kindeditor-all-min.js"></script>
    <script charset="utf-8" src="../ed/lang/zh-CN.js"></script>
    <script src="../active/jquery-2.2.0.js"></script>
    <style>
        .title{
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
<h1>修改新闻</h1>
    <ul>
        <li><a href="news_list.php">新闻管理</a></li>
        <li><a href="works_list.php">作品管理</a></li>
        <li><a href="history_list.php">发展历程</a></li>
        <li><a href="magazine_list.php">内刊管理</a></li>
        <li><a href="banner_list.php">banner管理</a></li>
    </ul>

    <form action="../utils/operaBack.php" method="post" enctype="multipart/form-data" >
    <input type='hidden' value='1' name='cmd'>
    <?php
    require_once "../utils/NewsManager.php";
    require_once "../utils/Tools.php";


    $newsManager=new NewsManager();

    $newContent = $newsManager->getNewById($_GET["id"]);
    $typeList=$newsManager->getNewTypeList();
    echo "分类：<select name='type'>";
    while($row=mysql_fetch_array($typeList)){
        if($row["_type"]==$newContent["_type"]){
            echo "<option value='".$row["_type"]."' selected='selected'>".$row["_value"]."</option>";
        }else{
            echo "<option value='".$row["_type"]."'>".$row["_value"]."</option>";
        }
    }
    echo "</select>";
    echo "显示状态<select name='shows'>";
    if($newContent["_shows"]==1){
        echo "<option value='0'>隐藏</option>";
        echo "<option value='1' selected='selected'>显示</option>";
    }else{
        echo "<option value='0' selected='selected'>隐藏</option>";
        echo "<option value='1'>显示</option>";
    }
    echo "</select><br/>";
    echo "<input type='text' class='title' value='".$newContent["_title"]."' name='title'>";
    echo "<input type='hidden' value='".$_GET["id"]."' name='id'><br />";
    echo "时间：<input type='text' name='time' value='".$newContent["_time"]."'><br /><br />";
    echo "<div>缩略图：<img src='".Tools::getThumPicPath($newContent["_thumPath"])."' class='thum'>"."</div>";
    ?>

    <label for="thum">上传缩略图(宽150,高随便):</label>
    <input type="file" name="thum" accept="image/png,image/gif,image/jpg,image/jpeg">
    <p>摘要：</p>
    <textarea id="desc" name="desc" style="width:900px;height:100px;">
    <?php
    echo $newContent["_desc"];
    ?>
    </textarea>
    <p>正文：</p>
    <textarea id="editor" name="content" style="width:980px;height:600px;">
    <?php
    echo $newContent["_content"];
    ?>
    </textarea><br />

    <input type="submit" value="提交" id="submitBtn">
    <a href="news_list.php">取消</a>
</form>
<script>
    $(function(){
        KindEditor.ready(function(K){
            window.editor = K.create('#editor');
        });

        $("#submitBtn").click(function(){
            KindEditor.sync("#editor");
            return true;
        })
    })
</script>
    </div>
</body>
</html>