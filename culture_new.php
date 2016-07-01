<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>企业文化</title>
    <script src="active/jquery-2.2.0.js"></script>
    <script src="active/normal.js"></script>

    <link href="style/normal.css" rel="stylesheet" type="text/css">
    <link href="style/about_new.css" rel="stylesheet" type="text/css">
    <script src="active/about_new.js"></script>
    <script src="active/mobile.js"></script>

    <style>
        #main .content .pos{
            margin-bottom: 0;
        }
        #main .thum{
            float: left;
            text-align: center;
            margin: 15px 35px;
            font-size: 16px;
            cursor: pointer;
        }
        #main .thum .mask{
            width: 174px;
            height: 256px;
            background: rgba(206,174,102,0.2);
            position: absolute;
            display: none;
        }
        #main .thum img{
            display: block;
            box-shadow: 0 0 4px #000;
            margin-bottom: 10px;
            width: 174px;
            height: 256px;
        }

        #main .subContent li{
            overflow: hidden;
        }
        #main .subContent li .active .mask{
            display: block;
        }
        #bigImg{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: scroll;
            background: rgba(0,0,0,0.5);
            z-index: 1001;
            display: none;
        }
        #bigImg .container{
            margin: 0 auto;
            width: 1390px;
            position: relative;
        }
        #bigImg .container .pre,#bigImg .container .next{
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0,0,0,0.8);
            height: 100%;
            width: 100px;
            line-height: 100%;
        }
        #bigImg .pre img,#bigImg .next img{
            position: absolute;
            top: 45%;
            left: 30px;
        }
        #bigImg .pre,#bigImg .next{
            opacity: 0;
            cursor: pointer;
        }
        #bigImg .pre:hover,#bigImg .next:hover{
            opacity: 1;
        }
        #bigImg .content img{
            width: 1390px;
        }
    </style>
    <script>
        var dataSrc;//期刊数据源
        var pos;//期刊页数索引
        $(function(){
            $(window).resize(resetNavPos);
            $("#bigImg .content").click(function(){
                $("#bigImg").hide();
            })
            $("#main .thum").click(function(){
                $(this).addClass("active").siblings().removeClass("active");
                $("#bigImg").show();
                resetNavPos();
                dataSrc=$(this).attr("datasrc");
                dataSrc=dataSrc.split("|_|");
                pos=0;
                $("#bigImgCon").attr("src",dataSrc[pos]);
            })
            $("#bigImg .pre").click(function(){
                pos--;
                if(pos<0)pos=dataSrc.length-1;
                $("#bigImgCon").attr("src",dataSrc[pos]);
            })
            $("#bigImg .next").click(function(){
                pos++;
                if(pos>=dataSrc.length)pos=0;
                $("#bigImgCon").attr("src",dataSrc[pos]);
            })
        })


        function resetNavPos(){
            var goalX=$("#bigImg .content").offset().left;
            $("#bigImg .pre").css("left",goalX);
            goalX=$("#bigImg .content").offset().left+$("#bigImg .content").width()-100;
            $("#bigImg .next").css("left",goalX);
        }
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
            <a href="newlist_new.php">动态资讯</a><span>|</span>
            <a href="culture_new.php" class="active">企业文化</a><span>|</span>
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
        <p class="pos">当前位置：<a href="index.php">网站首页</a>><a href="#">企业文化</a></p>
        <div class="item" id="qywh">
            <h3 class="title">企业文化</h3>
            <h4 class="subTitle">corporate culture</h4>
            <div class="container">
                <ul class="subNav">
                    <li class="active">标识释义</li>
                    <li>文化理念</li>
                    <li>文化格言</li>
                </ul>
                <ul class="subContent">
                    <li class="active">
                        <div class="logo"><img src="asset/logo.png" alt=""></div>
                        <div class="_item">
                            <div class="flag_y"></div>
                            <div class="chi">
                                <h4>金色</h4>
                                <div>象征成熟、收获、尊贵、品质</div>
                            </div>
                        </div>
                        <div class="_item">
                            <div class="flag_g"></div>
                            <div class="chi">
                                <h4>绿色</h4>
                                <div>象征生命、生机、希望、和谐</div>
                                <h4 class="_title" style="margin-top: 5px">释义</h4>
                                <div>绿色的田野为背景，甲骨文的象形“文”字为内涵，“田野文化”的注释组合简洁鲜明地跃然视觉之中。甲骨文的“文”字象形为鱼，暗寓鱼龙善潜、畅游于文化海洋之博大精深之中，寄托连年有余的吉祥愿望。“文”字又是“人”和义字的组合，体现田野文化的人本理念和仁义品质。“田”字中的十字线突破字体，寓意勇于突破而四通八达志在四方的意愿与志向。</div>
                            </div>
                        </div>
                    </li>
                    <li style="padding-left: 30px">
                        <div class="whln_item">
                            <h4>田野愿景</h4>
                            <div>立足国内，面向国际，打造田野文化知名品牌。</div>
                        </div>
                        <div class="whln_item">
                            <h4>田野使命</h4>
                            <div>致力文化产业的研究与开发，文化产业的打造与创富。</div>
                        </div>
                        <div class="whln_item">
                            <h4>田野战略</h4>
                            <div>持续创新，稳步发展。</div>
                        </div>
                        <div class="whln_item">
                            <h4>田野精神</h4>
                            <div>客户至上，感恩负责，快乐自信，永不言败。</div>
                        </div>
                        <div class="whln_item">
                            <h4>管理科念</h4>
                            <div>以人为本，金的品德，铁的纪律，爱的群体。</div>
                        </div>
                        <div class="whln_item">
                            <h4>经营理念</h4>
                            <div>经营诚实守信，服务周到热情，确保产品质量，做出行业标准。</div>
                        </div>
                        <div class="whln_item">
                            <h4>人才理念</h4>
                            <div>首重德才兼备，弘扬忠诚敬业，注重综合能力，重视专业技能。</div>
                        </div>
                        <div class="whln_item">
                            <h4>价值理念</h4>
                            <div>多找方法，少找借口；靠原则做事，用结果交换。</div>
                        </div>
                        <div class="whln_item">
                            <h4>制作理念</h4>
                            <div>视商品为作品，凡作品求精品。</div>
                        </div>
                        <div class="whln_item">
                            <h4>质量方针</h4>
                            <div>品质与文化同驱，质量与创新同行。</div>
                        </div>
                    </li>
                    <li style="padding-left: 30px;line-height: 200%">
                        人在道上不修则废&nbsp;&nbsp;People do not repair the waste on the road<br />
                        行在坡上不进则退&nbsp;&nbsp;In the slope behind<br />
                        视商品为作品&nbsp;&nbsp;As the goods for the works<br />
                        凡作品求精品&nbsp;&nbsp;Who works for products<br />
                        在竞争中经风雨&nbsp;&nbsp;The wind and rain in the competition<br />
                        在服务中树品牌&nbsp;&nbsp;In the service brand<br />
                        以德立信以信立行&nbsp;&nbsp;To enact delixin to the letter<br />
                        以行立业以业立名&nbsp;&nbsp;In line with industry business name<br />
                        绿色的梦只要持之以耕&nbsp;&nbsp;The green dream as long as ploughing<br />
                        等到秋天定变成金色的收获&nbsp;&nbsp; Wait until the autumn will become a golden harvest<br />
                        利少而义多&nbsp;&nbsp;Less profits but more justice<br />
                        身劳而心安&nbsp;&nbsp;The body mind and work<br />
                        之为仁念已之短好人之长&nbsp;&nbsp;The benevolence of the good has been short<br />
                        向善忌恶之为品&nbsp;&nbsp;To avoid evil for goods<br />
                        人为本善以待之&nbsp;&nbsp;Good for the people<br />
                        百川归于海方成就威加海内&nbsp;&nbsp;Rivers to sea side at the achievements of Wei<br />
                        耕于田行于野&nbsp;&nbsp;Calf in the wild<br />
                        研于文成于化&nbsp;&nbsp;Research on the text<br />
                        士不可不弘毅&nbsp;&nbsp;People can not Hony<br />
                        任重而道远&nbsp;&nbsp;Long way to go<br />
                        <div>人在道上不修则废&nbsp;&nbsp; People do not repair the waste on the road</div><br />
                    </li>
                </ul>
            </div>
        </div>
        <div class="item" id="qynk">
            <h3 class="title">企业内刊</h3>
            <h4 class="subTitle">Within the enterprise</h4>
            <div class="container">
                <ul class="subNav">
                    <?php
                    require_once "utils/MagazineManager.php";

                    $magazineManager=new MagazineManager();
                    $result = $magazineManager->getMagazineList();
                    $rowArr=array();
                    while($row=mysql_fetch_array($result)){
                        array_push($rowArr,$row);
                    }
                    //初始化年数组
                    $yearArr=array();
                    for($i=0;$i<count($rowArr);$i++){
                        for($j=0;$j<count($yearArr);$j++){
                            if($rowArr[$i]["_year"]==$yearArr[$j]){
                                break;
                            }
                        }
                        //年数组中没有这一年
                        if($j==count($yearArr)){
                            array_push($yearArr,$rowArr[$i]["_year"]);
                        }
                    }

                    for($i=0;$i<count($yearArr);$i++){
                        if($i==0){
                            echo "<li class='active'>".$yearArr[$i]."</li>";
                        }else{
                            echo "<li>".$yearArr[$i]."</li>";
                        }
                    }
                    ?>
                </ul>
                <ul class="subContent">
                    <?php
                    for($i=0;$i<count($yearArr);$i++){
                        if($i==0){
                            echo "<li class='active'>";
                        }else{
                            echo "<li>";
                        }

                        for($j=0;$j<count($rowArr);$j++){
                            $row=$rowArr[$j];
                            if($row["_year"]==$yearArr[$i]){
                                echo "<div class='thum' datasrc='".$row["_content"]."'>";
                                echo "<div class='mask'></div>";
                                echo "<img src='".$row["_thum"]."'>";
                                echo $row["_title"];
                                echo "</div>";
                            }
                        }
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
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
<div id="bigImg">
    <div class="container">
        <div class="pre"><img src="asset/pre1.png" alt=""></div>
        <div class="content"><img src="" id="bigImgCon"></div>
        <div class="next"><img src="asset/next1.png" alt=""></div>
    </div>
</div>
</body>
</html>