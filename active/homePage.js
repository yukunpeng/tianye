/**
 * Created by Administrator on 2016/4/11.
 */
var homePage={
    scrollFp:1,
    init:function(){
        this.initScroll();
        $("#page1 .newsList dd").click({workNewType:2},worksPage.worksGridClick);
    },
    //滚动新闻
    initScroll:function(){
        var dd=$("#page1 .newsList dd");
        dd.mouseover(this.stopScroll);
        dd.mouseout(this.beginScroll);
        this.beginScroll();
    },
    stopScroll:function(){
        clearInterval(homePage.scrollFp);
    },
    beginScroll:function(){
        homePage.scrollFp=setInterval(function(){
            var dd=$("#page1 .newsList dd:first");
            dd.animate({"marginTop":"-"+dd.height()+"px"},1000,function(){
                dd.css("marginTop",0).appendTo($("#page1 .newsList"));
            });
        },2000);

    }
}