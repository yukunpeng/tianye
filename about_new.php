<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>认知田野</title>
    <script src="active/jquery-2.2.0.js"></script>
    <script src="active/normal.js"></script>

    <link href="style/normal.css" rel="stylesheet" type="text/css">
    <link href="style/about_new.css" rel="stylesheet" type="text/css">
    <script src="active/about_new.js"></script>
    <script src="active/mobile.js"></script>

</head>
<body>
<nav id="nav">
    <div class="content">
        <h1 class="logo"><a href="index.php">田野文化科技</a></h1>
        <div class="main">
            <img src="asset/sign.png" id="navBg">
            <a href="index.php">网站首页</a><span>|</span>
            <a href="about_new.php" class="active">认知田野</a><span>|</span>
            <a href="worklist_new.php?type=1000">领域案例</a><span>|</span>
            <a href="newlist_new.php">动态资讯</a><span>|</span>
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
        <p class="pos">当前位置：<a href="index.php">网站首页</a>><a href="#">认知田野</a></p>
        <div class="video">
            <video src="asset/ty.mp4" poster="asset/v2.jpg" width="800" height="450" controls autobuffer></video>
        </div>
        <div class="item" id="gsjj">
            <h3 class="title">公司简介</h3>
            <h4 class="subTitle">Company profile</h4>
            <div class="container">
                <p style="text-align: center">
                    <img src="asset/gsjj.jpg" alt="">
                </p>
                <p>田野文化产业机构是一家专业从事大中型文博馆、军警馆、校史馆、企业馆方案设计、施工布展的文化产业集团，拥有国家住建部颁发的建筑装饰装修设计甲级、施工一级资质和中国展览馆协会展览工程企业一级资质。公司经历了近20年的高速发展后，旗下汇集了10大权威总监、360人精英团队、60名资深设计师、20支专业工程队、160名专业工程技术人员，市场遍布全国26个省区市，北京、石家庄、西安、广州、桂林、海口、合肥、郑州、美国波特兰等分支机构先后成立。公司与中央美术学院签署校企合作，依托中央美院的优势资源，提升公司设计水平和市场竞争力，在文化创意产业领域成为强强联合的生力军。
                </p>
                <p>田野拥有包括中国船舶博物馆、中国农业历史博物馆、中国粥文化博物馆、中国海洋生物标本博物馆、宁夏须弥山石窟博物馆、九华山佛教文化博物馆、鄂州博物馆、安徽中医药标本馆、杨惟义昆虫博物馆、南海舰队军史馆、潜艇某基地军史馆、武警山东省总队警史馆、武警浙江省总队警史馆、武警贵州省总队警史馆、武警湖南省总队警史馆、河南博物院、洛阳博物馆、全国第一个农村党支部纪念馆、赵朴初纪念馆、罗贯中纪念馆、康百万庄园、河南省农科院院史馆、交通银行湖北省分行行史馆、江苏省分行行史馆及复旦大学、西安交通大学、中国科技大学、海军工程大学、空军工程大学、海军航空工程学院、陆军航空兵学院等一大批军地重点院校校史馆的600多个优秀展馆业绩，逾亿受众遍布全国。其中，由我公司设计布展的“南海舰队军史馆”荣获国家业内最高奖——全国博物馆十大陈列展览精品奖。公司董事长及公司分别获得了“和谐中国2009年度十大杰出人物”、“河南省十大文化新闻人物”、“建筑装饰行业先进企业”、“河南省十大诚信品牌”、“深圳国际设计大赛优秀作品”、“中国国际环境艺术设计展陈类设计大奖”等众多荣誉称号，顺利通过ISO三项体系认证。布展项目分别受到习近平、吴邦国、刘云山、吴仪、路甬祥、韩启德、彭佩云、布赫、李建国、王志珍、吴胜利等党和国家领导人的赞誉，文化界知名人士王蒙、范曾、赵季平、贾平凹等对公司发展给予高度关注。
                </p>
            </div>
        </div>
        <div class="item" id="qywh">
            <h3 class="title">主营业务</h3>
            <h4 class="subTitle">main business</h4>
            <div class="container">
                <ul class="subNav business">
                    <li class="active">布展设计与施工</li>
                    <li>工程装饰设计与施工</li>
                    <li>新媒体研发与应用</li>
                    <li>雕塑设计与制作</li>
                    <li>景观设计与施工</li>
                    <li>品牌与平面设计</li>
                    <li>商业摄影与影视制作</li>
                </ul>
                <ul class="subContent zyyw">
                    <li class="active">
                        <h3>布展设计与施工</h3>
                        <img src="asset/image185.jpg" alt="">
                        <p>
                            服务涉及博物馆、文化馆、纪念馆、校史馆、军史馆、警史馆、企业展馆等固定展览馆项目。目前，田野已拥有400多个各类优秀展览馆案例，3000万受众遍布全国。在项目规划、设计、施工、布展一体化服务模式下，公司业绩稳步增长。
                        </p>
                    </li>
                    <li>
                        <h3>工程装饰设计与施工</h3>
                        <img src="asset/image175.jpg" alt="">
                        <p>
                            服务涉及环境布局规划、空间换将装饰、办公环境设计等。田野为河南省中医院门诊大楼、豫光集团办公大楼、中联公司晋城分公司办公大楼等量身定做的空间装饰设计，不仅是一种办公、娱乐生活方式的表达，也是企业精神文化的至关展现。
                        </p>
                    </li>
                    <li>
                        <h3>新媒体研发与应用</h3>
                        <img src="asset/image171.jpg" alt="">
                        <p>服务涉及数字化展览馆、数字化展项、多媒体软硬件开发等。天人才济济、创意新颖、设备先进、专业为客户打造有品位、有价值的数字博物馆、投影互动、多点互动、投影沙盘、虚拟仿真游戏、触摸查询。4D影院等数字新媒体精品。</p>
                    </li>
                    <li>
                        <h3>雕塑设计与制作</h3>
                        <img src="asset/image167.jpg" alt="">
                        <p>服务涉及场景再现、展馆雕塑、城市雕塑、景观雕塑的设计与制作。场景、雕塑模型类服务，是随着田野各类展馆的规划、设计、施工应运而生的一项成熟业务。同时工艺雕塑厂的设立，也是公司纵向发展模式的有一个里程碑。</p>
                    </li>
                    <li>
                        <h3>景观设计与施工</h3>
                        <img src="asset/image163.jpg" alt="">
                        <p>服务涉及学校文化景观设计、城市景观规划和设计等。田野作为校园文化的开拓者，从整体上整合、提升校园文化的时代潮流，多年来为多所学校完成了校园文化建设的整体规划及景观设计。</p>
                    </li>
                    <li>
                        <h3>品牌与平面设计</h3>
                        <img src="asset/image159.jpg" alt="">
                        <p>服务涉及品牌形象设计、企业画册设计、校庆纪念册设计、校庆LOGO设计、企业VI设计等。从省内到省外，再到全国各地，从小型画册到校庆专题画册，再到各类品牌形象画册，田野的设计紧跟时代。精美的画册与标识，是田野为教育、医疗、文化、商贸等领域企业品牌形象与文化传播做出的贡献，田野的创意没有巅峰。</p>
                    </li>
                    <li>
                        <h3>商业摄影与影视制作</h3>
                        <img src="asset/image155.jpg" alt="">
                        <p>田野商业摄影以传播商业信息和广告理念为核心。我们通过品牌调研、定位及策略分析，力图达到企业核心视觉、企业理念、终端形象、品牌传播等诸多要素的和谐统一。影视制作为公司传统业务之一，主要通过专业的影视拍摄和后期编辑，为企事业单位制作各类形象宣传片、专题宣传片等。</p>
                    </li>

                </ul>
            </div>
        </div>
        <div class="item" id="team">
            <h3 class="title">组织架构</h3>
            <h4 class="subTitle">organizational structure</h4>
            <div class="container">
                <p style="text-align: center">
                    <img src="asset/zzjg.jpg" alt="" >
                </p>
            </div>
        </div>
        <div class="item" id="sgtd">
            <h3 class="title">施工团队</h3>
            <h4 class="subTitle">Construction team</h4>
            <div class="container">
                <p style="text-align: center">
                    <img src="asset/sgtd.jpg" alt="">
                </p>
            </div>
        </div>
        <div class="item" id="fzlc">
            <h3 class="title">发展历程</h3>
            <h4 class="subTitle">development history</h4>
            <div class="container">
                <ul class="subNav">
                    <?php
                    require_once "utils/HistoryManager.php";

                    $historyManager=new HistoryManager();
                    $result = $historyManager->getHistoryList();
                    $pos=0;
                    while($row=mysql_fetch_array($result)){
                        if($pos==0){
                            echo "<li class='active'>".$row["_title"]."</li>";
                        }else{
                            echo "<li>".$row["_title"]."</li>";
                        }
                        $pos++;
                    }
                    ?>
                </ul>
                <ul class="subContent">
                    <?php
                    $result = $historyManager->getHistoryList();
                    $pos=0;
                    while($row=mysql_fetch_array($result)){
                        if($pos==0){
                            echo "<li class='active'>".$row["_content"]."</li>";
                        }else{
                            echo "<li>".$row["_content"]."</li>";
                        }
                        $pos++;
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
<ul id="subNav">
    <li class="active">回顶部</li>
    <li>公司简介</li>
    <li>主营业务</li>
    <li>组织架构</li>
    <li>施工团队</li>
    <li>发展历程</li>
</ul>

</body>
</html>