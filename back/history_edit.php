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
    <title>编辑发展历程</title>

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
</head>
<body>
<div id="wrap">

<h1>编辑发展历程</h1>
    <ul>
        <li><a href="news_list.php">新闻管理</a></li>
        <li><a href="works_list.php">作品管理</a></li>
        <li><a href="history_list.php">发展历程</a></li>
        <li><a href="magazine_list.php">内刊管理</a></li>
        <li><a href="banner_list.php">banner管理</a></li>
    </ul>

    <form method="post" action="../utils/operaBack.php" enctype="multipart/form-data" >
    <input name="cmd" value="18" type="hidden">

<?php
echo "<input name='id' value='".$_GET["id"]."' type='hidden'>";
require_once "../utils/HistoryManager.php";
require_once "../utils/Tools.php";

$historyManager=new HistoryManager();
$result = $historyManager->getHistoryById($_GET["id"]);
$row=mysql_fetch_array($result);
echo "<h1>时间段：<input type='text' name='title' value='".$row["_title"]."'></h1>";

?>

    <label>正文：</label>
    <textarea id="editor" name="content" style="width:980px;height:600px;">
        <?php
        echo $row["_content"];
        ?>
    </textarea><br />
    <input value="提交" type="submit" id="submitBtn">
    <a href="history_list.php">取消</a>
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
