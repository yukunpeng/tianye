<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>联系我们</title>
    <script src="active/jquery-2.2.0.js"></script>
    <script src="active/normal.js"></script>
    <link href="style/normal.css" rel="stylesheet" type="text/css">
    <script src="active/mobile.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        nav{
            margin: 0 0 50px 0;
        }
        #main{
            overflow: hidden;
        }
        #main .content{
            width: 1000px;
            margin: 0 auto;
        }
        /*pos*/
        #main .content .pos{
            padding:20px 0;
            border-bottom: 1px dashed #CFAE00;
            margin-bottom: 20px;
            font-size: 14px;
        }
        #main .pos a{
            color: #006100;
        }
        #main .pos a:hover{
            color: #CFAE00;
        }
        /*join*/
        #main .joinUs{
            display: inline-block;
            padding: 6px 20px;
            background-color: #00612e;
            color: #fff;
            border-radius: 3px;
            transition: background-color 0.5s;
        }
        #main .joinUs:hover{
            background-color: #00816e;
        }
        /*list*/
        #main .list{
            overflow: hidden;
            margin-top: 20px;
        }
        #main .list li{
            width: 440px;
            height: 160px;
            margin: 5px;
            float: left;
            font-size: 14px;
            border: 1px solid #999;
            border-radius: 3px;
            padding: 10px 20px;
            color: #666;
        }
        #main .list .title{
            margin-bottom: 20px;
            font-size: 16px;
        }
        #main .list li.active{
            border: 1px solid #00612e;
            background-color: #f6fffe;
        }

        /*map*/
        #main .map{
            margin: 20px 0;
            text-align: center;
            font-size: 14px;
        }
        #main .map .title{
            text-align: left;
            padding-bottom: 10px;
            border-bottom: 1px dashed #CFAE00;
        }
        #main .map .mapContent{
            margin: 0 auto;
            position: relative;
            /*left: 50%;*/
            margin-top: 30px;
            border-radius: 5px;
            box-shadow: 0 0 6px #666;
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
        /*百度地图*/
        .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
        .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
    </style>
     <!-- 百度地图-->
    <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
    <script>
        function GetQueryString(name) {
            var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if(r!=null)return  unescape(r[2]); return null;
        }
        $(function(){
            var pos=GetQueryString("pos");
            if(pos){
                var li=$("#main .list li:eq("+pos+")");
                li.addClass("active");
                $("html,body").animate({scrollTop:(li.offset().top-90)+"px"},300);
            }
            $("#main .list li").click(function(){
                $(this).addClass("active").siblings().removeClass("active");
            })
        })

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
            <a href="culture_new.php">企业文化</a><span>|</span>
            <a href="contact_new.php"  class="active last">联系我们</a>
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
        <p class="pos">当前位置：<a href="index.php">网站首页</a>><a href="#">联系我们</a></p>
        <a href="http://company.zhaopin.com/%E6%B2%B3%E5%8D%97%E7%94%B0%E9%87%8E%E6%96%87%E5%8C%96%E8%89%BA%E6%9C%AF%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8_CC142401222.htm" target="_blank" class="joinUs">加入我们</a>
        <ul class="list">
            <li>
                <h4 class="title">公司总部：田野文化(郑州)公司</h4>
                <p>
                    电话：0371-6582 5291<br />
                    传真：0371-6582 5296<br />
                    邮箱：tyc1996@163.com<br />
                    地址：郑州市农科路38号金城国际广场5#-A-21F<br>
                    邮编：450000
                </p>
            </li>
            <li>
                <h4 class="title">田野文化(北京)公司</h4>
                <p>
                    电话：138 3710 2503<br />
                    邮箱：tianyewenhua@126.com<br />
                    地址：北京市东城区广渠家园2号<br>
                    邮编：100088
                </p>
            </li>
            <li>
                <h4 class="title">田野文化(西安)公司</h4>
                <p>
                    电话：137 0022 2958<br />
                    联系人：刘政<br />
                    地址：西安市友谊东路81号天伦盛世大厦801室<br>
                    邮编：710068
                </p>
            </li>
            <li>
                <h4 class="title">田野文化(合肥)公司</h4>
                <p>
                    电话：138 5690 8293<br />
                    联系人：霍佳佳<br />
                    地址：合肥市三孝口CBD中央商务广场公寓楼1808室<br>
                    邮编：230001
                </p>
            </li>
            <li>
                <h4 class="title">田野文化(成都)公司</h4>
                <p>
                    电话：138 3822 3337<br />
                    联系人：杨志超<br />
                    地址：成都市锦江区四圣祠南街8号8-3-6<br>
                </p>
            </li>
            <li>
                <h4 class="title">田野文化(桂林)公司</h4>
                <p>
                    电话：137 8857 3666<br />
                    联系人：何志伟<br />
                    地址：<br>
                </p>
            </li>
            <li>
                <h4 class="title">田野文化(河北)公司</h4>
                <p>
                    电话：138 3310 1605<br />
                    地址：河北省石家庄市开发区黄河大道与祁连街交叉口润都盛和广场B座1111室<br>
                </p>
            </li>
            <li>
                <h4 class="title">田野文化(银川)公司</h4>
                <p>
                    电话：136 2381 4751<br />
                    联系人：安琪<br />
                    地址：宁夏银川市兴庆区唐徕小区20号<br>
                    邮编：750001
                </p>
            </li>
            <li>
                <h4 class="title">田野文化(广州)公司</h4>
                <p>
                    电话：186 6473 2000<br />
                    联系人：王光华<br />
                    地址：广州市天河区华观路1933-2号万科云广场D栋4楼C02房<br>
                    邮编：528400
                </p>
            </li>
            <li>
                <h4 class="title">田野文化(海南)公司</h4>
                <p>
                    电话：156 3926 6857<br />
                    联系人：刘延龙<br />
                    地址：海口市珠海大道39号南方明珠B6-2号<br>
                    邮编：570100
                </p>
            </li>
        </ul>
        <div class="map">
            <h4 class="title">总部位置：</h4>
        </div>
    </article>
</div>
<!--百度地图容器-->
<div class="mapContent" style="width:98%;margin: 0 auto; height:600px;border:#ccc solid 1px;" id="dituContent"></div>

<footer id="footer">
    <div class="footer">
        <img src="asset/tel.png" alt="">
        <span>+86 0371 6582 5291</span>
        <span> ©2015 Tianye Culture 豫ICP备0600882</span>
    </div>
</footer>

<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }

    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(113.697527,34.799986);//定义一个中心点坐标
        map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }

    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        //map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }

    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
        var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
        map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
        var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
        map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
        var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
        map.addControl(ctrl_sca);
    }

    //标注点数组
    var markerArr = [{title:"田野文化",content:"河南省郑州市金水区经三路与东风路金成国际广场<br/>5号楼A单元21层<br/><br/>电话:0371 65825291",point:"113.697464|34.79986",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
    ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
            var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
            var iw = createInfoWindow(i);
            var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
            marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                borderColor:"#808080",
                color:"#333",
                cursor:"pointer"
            });

            (function(){
                var index = i;
                var _iw = createInfoWindow(i);
                var _marker = marker;
                _marker.addEventListener("click",function(){
                    this.openInfoWindow(_iw);
                });
                _iw.addEventListener("open",function(){
                    _marker.getLabel().hide();
                })
                _iw.addEventListener("close",function(){
                    _marker.getLabel().show();
                })
                label.addEventListener("click",function(){
                    _marker.openInfoWindow(_iw);
                })
                if(!!json.isOpen){
                    label.hide();
                    _marker.openInfoWindow(_iw);
                }
            })()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("asset/mapicon.gif", new BMap.Size(19,25));
        //var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }

    initMap();//创建和初始化地图
</script>
</body>
</html>