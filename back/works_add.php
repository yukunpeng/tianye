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
    <title>添加作品</title>

    <script charset="utf-8" src="../ed/kindeditor-all-min.js"></script>
    <script charset="utf-8" src="../ed/lang/zh-CN.js"></script>
    <script src="../active/jquery-2.2.0.js"></script>
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
<h1>添加作品</h1>
    <ul>
        <li><a href="news_list.php">新闻管理</a></li>
        <li><a href="works_list.php">作品管理</a></li>
        <li><a href="history_list.php">发展历程</a></li>
        <li><a href="magazine_list.php">内刊管理</a></li>
        <li><a href="banner_list.php">banner管理</a></li>
    </ul>

<form method="post" action="../utils/operaBack.php" enctype="multipart/form-data" >
    <input name="cmd" value="9" type="hidden">
    作品标题：<br />
    <input id='titleTxt' name="title" type='text'><br/>
    <?php
    require_once "../utils/WorksManager.php";
    require_once "../utils/Tools.php";
    $worksManager=new WorksManager();

    $typeList=$worksManager->getWorkTypeList();
    while($row=mysql_fetch_array($typeList)){
        echo $row["_value"]."<input type='checkbox' name='".$row["_type"]."'> | ";
    }

    echo "<br /><br />显示状态<select name='shows'>";
    echo "<option value='0'>隐藏</option>";
    echo "<option value='1' selected='selected'>显示</option>";
    echo "</select>";
    ?>
    时间：<input type="text" name="time">
    首页显示：<input type="checkbox" name="recommend"><br /><br />

    <label for="thum">上传缩略图(宽180*高152):</label>
    <input type="file" name="thum" id="thum" accept="image/png,image/gif,image/jpg,image/jpeg">
    <br/><br/>
    <textarea id="editor" name="content" style="width:980px;height:600px;"></textarea><br />
    <input value="提交" type="submit" id="submitBtn">
    <a href="works_list.php">取消</a>
</form>

<script>
    $(function(){
        KindEditor.ready(function(K) {
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