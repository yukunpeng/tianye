<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>动态资讯</title>
    <script src="active/jquery-2.2.0.js"></script>
    <script src="active/normal.js"></script>

    <link href="style/normal.css" rel="stylesheet" type="text/css">

    <script>
        $(function(){
            $("#jumpBtn").click(function(){
                var goalPage=parseFloat($("#jumpTxt").val());
                var sumPage=parseFloat($("#sumPage").text());
                if(goalPage>sumPage||goalPage<1||!goalPage){
                    $("#jumpTxt").css("backgroundColor","#dbb36a");
                }else{
                    window.location.href="newlist_new.php?page="+goalPage;
                }
            })
            $("#jumpTxt").click(function(){
                $(this).css("backgroundColor","#fff");
            })
        })
    </script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        img{
            border: none;
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
        }
        #main .pos a{
            color: #00612e;
        }
        #main .pos a:hover{
            color: #CFAE00;
        }
        #main .list li{
            position: relative;
            padding: 25px 0;
            border-bottom: 1px solid #c1c1c1;
            min-height: 170px;
        }
        #main .list .img{
            display: block;
            width: 150px;
            /*height: 150px;*/
        }
        #main .list article{
            width: 800px;
            height: 150px;
            position: absolute;
            right: 0;
            top: 25px;
        }
        #main .list .title a{
            color: #333;
            font-size: 20px;
        }
        #main .list .title a:hover{
            text-decoration: underline;
        }
        #main .list .subTitle{
            color: #666;
            font-size: 12px;
            margin: 13px 0 23px;
        }
        #main .list .des{
            color: #666;
            font-size: 12px;
            text-indent: 2em;
        }

        /*more*/
        #main .more{
            position: absolute;
            bottom: 10px;
            right: 10px;
            color: #00612e;
            font-size: 12px;
            text-decoration: underline;
        }
        #main .more:hover{
            color: #CFAE00;
        }
        #main .nav{
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        #main .nav a{
            color: #666;
            padding: 0 4px;
        }
        #main .nav a:hover{
            color: #666;
        }
        #main .nav a.active{
            color: #666;
            border: 1px solid #666;
        }
        #main .nav .txt{
            width: 25px;
            margin: 0 2px;
            text-align: center;
            border: 1px solid #333;
        }
        #main .nav .btn{
            width: 50px;
            height: 25px;
            text-align: center;
            background-color: #7B8C9E;
            border: none;
            color: #fff;
        }

        #main .nav .pre,#main .nav .next{
            margin:0 28px;
            border-bottom: 1px solid #666;
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
    </style>
    <script src="active/mobile.js"></script>

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
        <p class="pos">当前位置：<a href="index.php">网站首页</a>><a href="#">动态资讯</a></p>
        <ul class="list">
            <?php
            require_once "utils/NewsManager.php";
            $newsManager=new NewsManager();
            //获取当前页数
            if(isset($_GET["page"])){
                $curPage=$_GET["page"];
            }else{
                $curPage=1;
            }
            $result = $newsManager->getNewsListByPage($curPage,false);

            while($row=mysql_fetch_array($result)){
                echo "<li>";
                echo "<a href='newcontent_new.php?id=".$row["_id"]."'>";
                echo "<img src='".Tools::getThumPicPath($row["_thumPath"])."' class='img'>";
                echo "</a>";
                echo "<article>";
                echo "<h3 class='title'><a href='newcontent_new.php?id=".$row["_id"]."'>".$row["_title"]."</a></h3>";
                echo "<h6 class='subTitle'>发表时间：".$row["_time"]."</h6>";
                echo "<div class='des'>".mb_substr($row["_desc"],0,500,"utf-8")."...</div>";
                echo "</article>";
                echo "<a href='newcontent_new.php?id=".$row["_id"]."' class='more'>查看全文</a>";
                echo "</li>";
            }
            ?>
        </ul>
        <div class="nav">
            <?php
            $sumPage=$newsManager->getNewsSumPage(false);
            $prePage=$curPage-1;
            $nextPage=$curPage+1;
            if($prePage<=0)$prePage=1;
            if($nextPage>$sumPage)$nextPage=$sumPage;

            //后退导航
            echo "<a href='newlist_new.php?page=1'>首页</a>";
            echo "<a class='pre' href='newlist_new.php?page=$prePage'>上一页</a>";

            //第一页
            if($curPage==1){
                if($sumPage==1){
                    echo "<a class='active' href='newlist_new.php?page=1' id='sumPage'>1</a>";
                }else{
                    echo "<a class='active' href='newlist_new.php?page=1'>1</a>";
                }
            }else{
                echo "<a href='newlist_new.php?page=1'>1</a>";
            }
            if($sumPage!=1){
                if($sumPage<=7){
                    //总页数小于7
                    $temp=2;
                    //总页数小于
                    while($temp<$sumPage){
                        if($temp==$curPage){
                            echo "<a class='active' href='newlist_new.php?page=$temp'>$temp</a>";
                        }else{
                            echo "<a href='newlist_new.php?page=$temp'>$temp</a>";
                        }
                        $temp++;
                    }
                }else{
                    //总页数大于7
                    if($curPage<=4){
                        //靠前
                        for($i=2;$i<7;$i++){
                            if($curPage==$i){
                                echo "<a class='active' href='newlist_new.php?page=$i'>$i</a>";
                            }else{
                                echo "<a href='newlist_new.php?page=$i'>$i</a>";
                            }
                        }
                        echo "<span>...</span>";
                    }else if($curPage>=$sumPage-3){
                        echo "<span>...</span>";
                        //靠后
                        for($i=$sumPage-5;$i<$sumPage;$i++){
                            if($curPage==$i){
                                echo "<a class='active' href='newlist_new.php?page=$i'>$i</a>";
                            }else{
                                echo "<a href='newlist_new.php?page=$i'>$i</a>";
                            }
                        }
                    }else{
                        //中间
                        echo "<span>...</span>";
                        for($i=$curPage-2;$i<$curPage+3;$i++){
                            if($curPage==$i){
                                echo "<a class='active' href='newlist_new.php?page=$i'>$i</a>";
                            }else{
                                echo "<a href='newlist_new.php?page=$i'>$i</a>";
                            }
                        }
                        echo "<span>...</span>";
                    }
                }
                //尾页
                if($curPage==$sumPage){
                    //当前页为最后一页
                    echo "<a class='active' href='newlist_new.php?page=$sumPage'>$sumPage</a>";
                }else{
                    echo "<a href='newlist_new.php?page=$sumPage' id='sumPage'>$sumPage</a>";
                }
            }
            //前进导航
            echo "<a class='next' href='newlist_new.php?page=$nextPage'>下一页</a>";
            echo "<a href='newlist_new.php?page=$sumPage'>末页</a>";
            ?>
            跳转:<input type="text" class="txt" id="jumpTxt">页
            <input type="button" value="确定" class="btn" id="jumpBtn">
        </div>
    </article>
</div>
<footer id="footer">
    <div class="footer">
        <img src="asset/tel.png" alt="">
        <span>+86 0371 6582 5291</span>
        <span> ©2015 Tianye Culture 豫ICP备0600882</span>
    </div>
</footer>
</body>
</html>