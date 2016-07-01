<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="000">
    <title>田野文化是一家专业从事各类博物馆、纪念馆、展览馆设计、施工、布展的文化产业集团</title>
    <meta name="description" content="河南田野文化艺术有限公司是一家致力于中国校园文化和校史馆设计建设的文化机构。服务项目有：博物馆装饰设计布展，校园文化规划设计施工，校史馆设计施工，各类教学场馆的设计与建设等。">
    <meta name="keywords" content="田野，tianye,田野文化，田野文化公司，博物馆，博物馆设计，博物馆布展，博物馆装饰设计，校史馆，郑州校史馆，校史馆,xsg,xiaoshiguan，郑州校史馆，校庆，校庆庆典，xiaoqingqingdian，xioqing，zhengzhouxiaoshiguan校园展板,校园文化,展板,历史教室,标本馆设计,走廊文化,楼道文化,浮雕,校园景观设计,实验室,科普馆,田野文化 郑州田野文化 郑州博物馆 zhengzhouxiaoshiguan 校庆规划设计 校庆画册 博物馆 校庆庆典 校史馆设计专家 xiaoshiguanshejizhuanjia 校庆公司 郑州展馆设计 河南最好的校史馆设计 中国排名第一校史馆 郑州文化公司 河南文化创意公司 xiaoshiguanzhanguan zhanguan huace wenhuayishu 校史陈列 中国校史陈列 荣誉室 学校荣誉室 院史馆 xiaoshichenlie 郑州校庆 郑州校庆画册 企业荣誉展厅 名人馆 北京校史馆 北京校园文化 上海校史馆 上海校园文化 广州校史馆 广州校园文化 湖南校史馆 湖南校园文化 重庆校史馆 重庆校园文化 安徽校史馆 安徽校园文化 江苏校史馆 江苏校园文化 西南校史馆 西南校园文化 黑龙江校史馆 黑龙江校园文化 郑州校史馆设计施工专业服务 校史馆设计施工专业服务 校园文化设计施工专业服务 校史馆方案 校史馆策划方案 校园文化策划方案 校园文化方案 037165825291">
    <meta name="owner" content="田野文化产业机构">
    <meta name="generator" content="tianye Network--Hsiehs's Tech; tyys.cn[at]163.com">
    <meta name="copyright" content="Copyright 1996-2009 tianye Network">
    <script src="active/jquery-2.2.0.js"></script>
    <script src="active/home_new.js"></script>
    <script src="active/normal.js"></script>

    <link href="style/home_new.css" rel="stylesheet" type="text/css">
    <script>
        $(function(){
            home_new.init();
        })
    </script>
    <style>
        ::-webkit-scrollbar {
            width: 5px;
        }
        ::-webkit-scrollbar-thumb {
            -webkit-border-radius: 2px;
            border-radius: 2px;
            background: rgba(0,97,46,0.8);
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.8);
        }
    </style>
</head>
<body>
<div id="banner">
    <ul class="content">
        <li class="active" style="background-image: url(asset/banner1.jpg)"></li>
        <li style="background-image: url(asset/banner2.jpg)"></li>
        <li style="background-image: url(asset/banner3.jpg)"></li>
    </ul>
    <img src="asset/bannerleft.png" class="bannerLeft">
    <img src="asset/bannerright.png" class="bannerRight">
</div>
<div id="about" class="item">
    <nav id="nav">
        <div class="content">
            <h1 class="logo"><a href="index.php">田野文化科技</a></h1>
            <div class="main">
                <img src="asset/sign.png" id="navBg">
                <a class="active" href="#">网站首页</a><span>|</span>
                <a href="about_new.php">认知田野</a><span>|</span>
                <a href="worklist_new.php?type=1000">领域案例</a><span>|</span>
                <a href="newlist_new.php">动态资讯</a><span>|</span>
                <a href="culture_new.php">企业文化</a><span>|</span>
                <a href="contact_new.php" class="last">联系我们</a>
            </div>
        </div>
    </nav>
    <div class="header"><img src="asset/about.png"></div>
    <div class="content">
        <video src="asset/ty.mp4" poster="asset/v1.jpg" width="430" height="240" controls autobuffer></video>
        <article>
            <div class="title">公司简介</div>
            <div class="subTitle">COMPANY PROFILE</div>
            <p>
                <span class="about_content">田野文化产业机构是一家专业从事大中型文博馆、军警馆、校史馆、企业馆方案设计、施工布展的文化产业集团，拥有国家住建部颁发的建筑装饰装修设计甲级、施工一级资质和中国展览馆协会展览工程企业一级资质。公司经历了近20年的高速发展后，旗下汇集了10大权威总监、360人精英团队、60名资深设计师、20支专业工程队、160名专业工程技术人员 . . .</span>
            </p>
        </article>
        <a href="about_new.php?pos=gsjj" class="more">查看详情>></a>
    </div>
</div>
<div id="case" class="item">
    <img src="asset/more.png" class="more">
    <div class="header">
        <img src="asset/wl.png" alt="" class="wl">
        <img src=asset/classic_al.png>
    </div>
    <div class="content">
        <div class="wrap">
            <ul class="container">
                <?php
                require_once "utils/WorksManager.php";
                require_once "utils/Tools.php";
                $worksManager=new WorksManager();
                $result = $worksManager->getWorksRecommend();
                $rowArr=array();
                while($row=mysql_fetch_array($result)){
                    array_push($rowArr,$row);
                }
                echo count($rowArr);
                while(count($rowArr)>0){
                    $len=count($rowArr);
                    $row=array_splice($rowArr,mt_rand(0,$len-1),1);
                    $row=$row[0];
                    echo "<li><a href='workcontent_new.php?id=".$row["_id"]."'>";
                    echo "<img src='".Tools::getThumPicPath($row['_thumPath'])."' class='thum'>";
                    echo $row["_title"];
                    echo "</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="pre"></div>
        <div class="next"></div>
    </div>
</div>
<div id="team" class="item">
    <div class="header"><img src="asset/qwzj.png" alt=""></div>
    <div class="content">
        <div class="pre"></div>
        <div class="next"></div>
        <div class="wrap">
            <ul class="container">
                <li pos="0"><img src="asset/man1.jpg" alt=""><br /><span class="name">朱东升</span><br /><span class="job">项目总监</span></li>
                <li pos="1"><img src="asset/man0.jpg" alt=""><br /><span class="name">王中</span><br /><span class="job">创意总监</span></li>
                <li pos="2"><img src="asset/man6.jpg" alt=""><br /><span class="name">于德水</span><br /><span class="job">艺术总监</span></li>
                <li pos="3"><img src="asset/man5.jpg" alt=""><br /><span class="name">Dennis</span><br /><span class="job">项目顾问</span></li>
                <li pos="4"><img src="asset/man7.jpg" alt=""><br /><span class="name">王征</span><br /><span class="job">策划总监</span></li>
                <li pos="5"><img src="asset/man8.jpg" alt=""><br /><span class="name">李嫣</span><br /><span class="job">国际运营总监</span></li>
                <li pos="6"><img src="asset/man3.jpg" alt=""><br /><span class="name">刘守中</span><br /><span class="job">市场商务总监</span></li>
                <li pos="7"><img src="asset/man4.jpg" alt=""><br /><span class="name">段凯宏</span><br /><span class="job">布展设计总监</span></li>
                <li pos="8"><img src="asset/man2.jpg" alt=""><br /><span class="name">孙琳娜</span><br /><span class="job">审计财务总监</span></li>
                <li pos="9"><img src="asset/man9.jpg" alt=""><br /><span class="name">程习武</span><br /><span class="job">项目总监</span></li>
            </ul>
        </div>

    </div>
    <a href="#"><img src="asset/totop.png" class="toTop"></a>

    <ul class="view">
        <li>
            <img src="asset/man1.jpg" alt="">
            <div class="intro">
                <div class="title">朱东升</div>
                <div class="subTitle">项目总监</div>
                <div class="job">
                    <p>田野文化产业机构董事长</p>
                    <p>中央美院兼职教授</p>
                    <p>河南省艺术摄影学会副主席</p>
                    <p>河南省创意产业协会副会长</p>
                    <p>河南省诗词学会常务理事</p>
                    <p>2009年度“和谐中国十大杰出人物”</p>
                    <p>河南省十大文化新闻人物</p>
                    <p>郑州大学客座教授</p>
                    <p>著名文博馆布展设计专家</p>
                </div>
            </div>
        </li>
        <li>
            <img src="asset/man0.jpg" alt="">
            <div class="intro">
                <div class="title">王中</div>
                <div class="subTitle">创意总监</div>
                <div class="job">
                    <p>中央美术学院教授,博士生导师</p>
                    <p>田野文化产业机构创意总监</p>
                    <p>城市设计学院院长</p>
                    <p>中国公共艺术研究中心主任</p>
                    <p>北京市人民政府专家顾问团顾问</p>
                    <p>全国城市雕塑艺术委员会副主任</p>
                    <p>中国城市雕塑家协会副主席</p>
                    <p>中国雕塑学会常务理事</p>
                    <p>国际动态艺术组织艺术委员</p>
                </div>
            </div>
        </li>
        <li>
            <img src="asset/man6.jpg" alt="">
            <div class="intro">
                <div class="title">于德水</div>
                <div class="subTitle">艺术总监</div>
                <div class="job">
                    <p>田野文化产业机构艺术总监</p>
                    <p>中国摄影家协会常务理事</p>
                    <p>河南省摄影家协会主席</p>
                </div>
            </div>
        </li>
        <li>
            <img src="asset/man5.jpg" alt="">
            <div class="intro">
                <div class="title">Dennis</div>
                <div class="subTitle">项目顾问</div>
                <div class="job">
                    <p>田野文化纽约国际艺术中心艺术总监</p>
                    <p>美国亚特兰大州立大学</p>
                    <p>副校长、博士生导师</p>
                    <p>全美艺术联盟副秘书长</p>
                </div>
            </div>
        </li>
        <li>
            <img src="asset/man7.jpg" alt="">
            <div class="intro">
                <div class="title">王征</div>
                <div class="subTitle">策划总监</div>
                <div class="job">
                    <p>田野文化产业机构策划总监</p>
                    <p>中美合资北京公司总经理</p>
                    <p>当代杰出纪实摄影大师</p>
                    <p>大型文化活动策划专家</p>
                    <p>编辑出版家</p>
                </div>
            </div>
        </li>
        <li>
            <img src="asset/man8.jpg" alt="">
            <div class="intro">
                <div class="title">李嫣</div>
                <div class="subTitle">国际运营总监</div>
                <div class="job">
                    <p>田野文化产业机构国际运营总监</p>
                    <p>田野纽约国际文化艺术中心CEO</p>
                    <p>英国皇家摄影学会终身会士</p>
                    <p>中外文化使者</p>
                </div>
            </div>
        </li>
        <li>
            <img src="asset/man3.jpg" alt="">
            <div class="intro">
                <div class="title">刘守中</div>
                <div class="subTitle">市场商务总监</div>
                <div class="job">
                    <p>田野文化产业机构总经理</p>
                    <p>田野文化产业结构市场商务总监</p>
                    <p>硕士研究生</p>
                    <p>国家高级职业经理人</p>
                </div>
            </div>
        </li>
        <li>
            <img src="asset/man4.jpg" alt="">
            <div class="intro">
                <div class="title">段凯宏</div>
                <div class="subTitle">布展设计总监</div>
                <div class="job">
                    <p>田野文化产业机构布展设计总监</p>
                    <p>高级室内建筑师</p>
                    <p>高级建筑装饰设计师</p>
                    <p>中国资深空间设计师</p>
                    <p>中国环境联盟理事</p>
                </div>
            </div>
        </li>
        <li>
            <img src="asset/man2.jpg" alt="">
            <div class="intro">
                <div class="title">孙琳娜</div>
                <div class="subTitle">审计财务总监</div>
                <div class="job">
                    <p>田野文化产业机构副董事长</p>
                    <p>国家一级注册造价师</p>
                    <p>国家高级设计师</p>
                </div>
            </div>
        </li>
        <li>
            <img src="asset/man9.jpg" alt="">
            <div class="intro">
                <div class="title">程习武</div>
                <div class="subTitle">文学总监</div>
                <div class="job">
                    <p>田野文化产业机构文学总监</p>
                    <p>中国作家协会会员</p>
                </div>
            </div>
        </li>
    </ul>
</div>
<div id="honer" class="item">
    <div class="header"><img src="asset/qyry.png" alt=""></div>
    <div class="content">
        <div class="wrap">
            <ul class="container">
                <li><img src="asset/honner5.jpg" alt="" style="width: 175px"></li>
                <li><img src="asset/honner6.jpg" alt="" style="width: 365px"></li>
                <li><img src="asset/honner3.jpg" alt="" style="width: 359px"></li>
                <li><img src="asset/honner2.jpg" alt="" style="width: 337px"></li>
                <li><img src="asset/honner1.jpg" alt="" style="width: 347px"></li>
                <li><img src="asset/honner4.jpg" alt="" style="width: 180px"></li>
            </ul>
        </div>
        <div class="pre"></div>
        <div class="next"></div>
    </div>
</div>
<footer id="footer">
    <div class="content">
        <img src="asset/twocode.png" alt=""><br/><br/>
        田野文化（郑州）公司<br>
        地址：郑州市农科路38号金城国际广场5号楼A座21F<br>
        电话：0371-65825291 &nbsp;&nbsp;  &nbsp;&nbsp; 传真：0371-65825296<br>
        <p class="sub">
            HTML：WWW.TYYS.CN<br>
            E-MAIL:TYC1996@163.COM<br>
        </p>

<!--        <img src="asset/footerwz.png">-->
    </div>
    <div class="subCompany">
        <ul>
            <li><a href="contact_new.php?pos=0">公司总部：田野文化(郑州)公司</a></li>
            <li><a href="contact_new.php?pos=1">田野文化(北京)公司</a></li>
            <li><a href="contact_new.php?pos=2">田野文化(西安)公司</a></li>
            <li><a href="contact_new.php?pos=3">田野文化(合肥)公司</a></li>
            <li><a href="contact_new.php?pos=4">田野文化(成都)公司</a></li>
            <li><a href="contact_new.php?pos=5">田野文化(桂林)公司</a></li>
            <li><a href="contact_new.php?pos=6">田野文化(河北)公司</a></li>
            <li><a href="contact_new.php?pos=7">田野文化(银川)公司</a></li>
            <li><a href="contact_new.php?pos=8">田野文化(广州)公司</a></li>
            <li><a href="contact_new.php?pos=9">田野文化(海南)公司</a></li>
        </ul>
    </div>
    <div class="footer">
        <img src="asset/totopblack.png" class="toTopBlack" />
        <img src="asset/tel.png" alt="">
        <span>+86 0371 6582 5291</span>
        <span> ©2015 Tianye Culture 豫ICP备0600882</span>
    </div>
</footer>
<div id="honnerPanel">
    <img src="asset/honner1.jpg" alt="">
</div>
<div id="glassPanel">
</div>
</body>
</html>