/**
 * Created by Administrator on 2016/4/11.
 */
var navBlock={
    init:function(){
        $("#foldBtn").click(this.foldBtnClick);
        $("#webNav>.nav a").click(this.webNavClick);
        $("#page1 dt").click(this.newsMenuClick);
    },
    //折叠左侧菜单
    foldTime:500,
    foldBtnClick:function(){
        var pageContainer=$("#pageContainer");
        var webNav=$("#webNav");
        var pageContainerGoalX;
        var webNavGoalX;
        if(pageContainer.offset().left==0){
            pageContainerGoalX=170;
            webNavGoalX=0;
        }else {
            pageContainerGoalX=0;
            webNavGoalX=170;
        }
        pageContainer.animate({left:pageContainerGoalX+"px"},this.foldTime);
        webNav.animate({left:webNavGoalX+"px"},this.foldTime);
    },
    //切换主导航
    webNavClick:function(){
        setTimeout(function(){
            worksPage.resetWinSize();
            worksPage.waterFall();
        },100);
        var showingNav=$("#webNav>.nav>li>a.active");
        var clickNav=$(this);
        if(showingNav.attr("id")==clickNav.attr("id")){
            return;
        }
        showingNav.removeClass("active");
        clickNav.addClass("active");
        navBlock.foldBtnClick();
        var showingIndex=showingNav.attr("id").substr(4,1);
        var clickIndex=clickNav.attr("id").substr(4,1);
        var showingPage=$("#page"+showingIndex);
        var clickPage=$("#page"+clickIndex);

        showingPage.css({
            transition: "transform 1s,opacity 1s",
            transform:"perspective(600px) rotateX(90deg)",
            transformOrigin: "50% 100% 0",
            opacity:0
        });
        setTimeout(function(){
            showingPage.css("display","none");
        },1000);
        clickPage.css({
            display:"block",
            transition: "",
            transform:"perspective(600px) rotateX(-90deg)",
            opacity:0
        });
        setTimeout(function(){
            clickPage.css({
                transition: "transform 0.5s,opacity 0.5s",
                transform:"perspective(600px) rotateX(0deg)",
                transformOrigin: "50% 0% 0",
                opacity:1
            });
        },10);
    },
    //直接跳到新闻页
    newsMenuClick:function(){
        $("#page1Nav").removeClass("active");
        $("#page3Nav").addClass("active");
        if($("#pageContainer").offset().left!=0){
            foldBtnClick();
        }
        var showingPage=$("#page1");
        var goalPage=$("#page3");
        showingPage.css({
            transition: "transform 1s,opacity 1s",
            transform:"perspective(600px) rotateX(90deg)",
            transformOrigin: "50% 100% 0",
            opacity:0
        })
        setTimeout(function(){
            showingPage.css("display","none");
        },1000)
        goalPage.css({
            display:"block",
            transition: "",
            transform:"perspective(600px) rotateX(-90deg)",
            opacity:0
        })
        setTimeout(function(){
            goalPage.css({
                transition: "transform 0.5s,opacity 0.5s",
                transform:"perspective(600px) rotateX(0deg)",
                transformOrigin: "50% 0% 0",
                opacity:1
            })
        },10);
    }
}