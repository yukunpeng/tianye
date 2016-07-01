<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>动态资讯</title>
    <script src="active/jquery-2.2.0.js"></script>
    <script src="active/jquery.qrcode.min.js"></script>
    <script src="active/normal.js"></script>
    <link href="style/normal.css" rel="stylesheet" type="text/css">
    <script src="active/mobile.js"></script>

    <style>
        .logo,div,nav,html,body{
            padding: 0;
            margin: 0;
        }
        nav{
            margin: 0;
        }
        #main{
            margin-bottom: 30px;
        }
        #main .content{
            width: 1000px;
            margin: 0 auto;
        }
        #main .content .pos{
            padding:20px 0;
            border-bottom: 1px dashed #CFAE00;
            font-size: 14px;
            margin: 0;
            position: relative;
        }
        #main .pos a{
            color: #006100;
        }
        #main .pos a:hover{
            color: #CFAE00;
        }
        #main .content .title,#main .content .time{
            text-align: center;
            margin: 20px 0;
        }
        #main .container{
            border-bottom: 1px dashed #CFAE00;
            padding-bottom: 20px;
            margin-bottom: 20px;
            line-height: 25px;
            font-size: 12px;
        }
        #main .container img{
            max-width: 100%;
        }
        #main .nav a{
            color: #999;
        }
        #main .nav .preTip{
            color: #00612e;
            font-weight: bold;
        }
        #main .nav .preTitle{
            color: #000;
            font-weight: bold;
            border-bottom: 1px solid #000;
        }
        #main .nav .nextTitle{
            border-bottom: 1px solid #999;
        }
        #banner{
            overflow: hidden;
            margin-top: 87px;
            height: 320px;
        }
        #banner img{
            position: relative;
            left: 50%;
            margin-left: -960px;
        }
        p{
            text-indent: 2em;
        }
        #qrCodeDiv{
            position: fixed;
            right: 20px;
            bottom: 20px;
        }
        #qrCodeDiv canvas{
            width: 100px;
            height: 100px;
        }
        .back{
            display: block;
            position: absolute;
            right: 0;
            top: 20px;
            width: 48px;
            height: 23px;
            background-image: url("asset/backarrow1.png");
        }
        .back:hover{
            background-image: url("asset/backarrow2.png");
        }
    </style>
    <script>
        $(function () {
            jQuery("#qrCodeDiv").qrcode(window.location.href);
            $(".back").click(function(){
                history.go(-1); //后退1页

            })
        });
    </script>
</head>
<body>
<nav id="nav">
    <div class="content">
        <h1 class="logo"><a href="index.php">田野文化科技</a></h1>
        <div class="main">
            <img src="asset/sign.png" id="navBg">
            <a href="index.php">网站首页</a><span>|</span>
            <a href="about_new.php">认知田野</a><span>|</span>
            <a href="worklist_new.php?type=1000">领域案例</a><span>|</span>
            <a class="active" href="newlist_new.php">动态资讯</a><span>|</span>
            <a href="culture_new.php">企业文化</a><span>|</span>
            <a href="contact_new.php"  class="last">联系我们</a>
        </div>
    </div>
</nav>
<div id="banner">
    <?php
    require_once "utils/BannerManager.php";
    require_once "utils/Tools.php";
    $bannerManager=new BannerManager();
    $result = $bannerManager->getBannerListFront();
    $rowArr=array();
    while($row=mysql_fetch_array($result)){
        array_push($rowArr,$row);
    }
    $row=$rowArr[mt_rand(0,count($rowArr)-1)];
    echo "<a href='".$row["_url"]."'>";
    echo "<img src='".$row["_picpath"]."'/></a>";
    ?>
</div>
<div id="main">
    <article class="content">
        <div class="pos">
            <div>
                当前位置：<a href="index.php">网站首页</a>><a href="newlist_new.php">动态资讯</a>><a href="#">正文</a>
            </div>
            <a href="javascript:void(0)" class="back"></a>
        </div>

        <?php
        require_once "utils/NewsManager.php";
        $newsManager=new NewsManager();
        $row = $newsManager->getNewById($_GET["id"]);

        echo "<h3 class='title'>".$row["_title"]."</h3>";
        echo "<h5 class='time'>分类：".$newsManager->getNewTypeNameByType($row["_type"])." | 发表日期：".$row["_time"]."</h5>";
        echo "<div class='container'>";
        echo $row["_content"];
        echo "</div>"
        ?>
        <div class="nav">
            <?php
            echo "<span class='preTip'>上一篇</span><br>";
            $sort=$row["_sort"];
            $row = $newsManager->getPreNewTitle($sort);
            echo "<a class='preTitle' href='newcontent_new.php?id=".$row["_id"]."'>".$row["_title"]."</a><br><br>";
            echo "下一篇<br>";
            $row = $newsManager->getNextNewTitle($sort);
            echo "<a class='nextTitle' href='newcontent_new.php?id=".$row["_id"]."'>".$row["_title"]."</a>";
            ?>
        </div>
    </article>
</div>
<footer id="footer">
    <div class="footer">
        <div class="con">
            <img src="asset/tel.png" alt="">
            <span>+86 0371 6582 5291</span>
            <span> ©2015 Tianye Culture 豫ICP备0600882</span>
        </div>
    </div>
</footer>
<div id="qrCodeDiv"></div>
</body>
</html>