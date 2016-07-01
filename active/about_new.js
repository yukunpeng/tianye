/**
 * Created by Administrator on 2016/5/4.
 */
$(function(){
    //企业文化
    $("#qywh .subNav li").mouseenter(function(){
        var pos=$("#qywh .subNav li").index(this);
        $(this).addClass("active").siblings().removeClass("active");
        $("#qywh .subContent li:eq("+pos+")").addClass("active").siblings().removeClass("active");
    })
    //发展历程
    $("#fzlc .subNav li").mouseenter(function(){
        var pos=$("#fzlc .subNav li").index(this);
        $(this).addClass("active").siblings().removeClass("active");
        $("#fzlc .subContent li:eq("+pos+")").addClass("active").siblings().removeClass("active");
    })
    //企业内刊
    $("#qynk .subNav li").mouseenter(function(){
        var pos=$("#qynk .subNav li").index(this);
        $(this).addClass("active").siblings().removeClass("active");
        $("#qynk .subContent li:eq("+pos+")").addClass("active").siblings().removeClass("active");
    })

    //点击导航
    $("#subNav li").click(function(){
        var pos=parseFloat($("#subNav li").index(this))-1;
        var toTop=0;
        var navH=$("nav").height();
        if(pos!=-1){
            toTop=$("#main .content .item:eq("+pos+")").offset().top-navH;
        }
        $("html,body").animate({scrollTop:toTop+"px"},300);
    })
    //鼠标滚轮触发
    $(window).scroll(function(){
        var navH=$("nav").height();
        var len=$("#main .content .item").length;
        for(var i=len-1;i>-1;i--){
            var pos=$("#main .content .item:eq("+i+")").offset().top;
            var scroll=$(window).scrollTop();
            if(pos-scroll<=navH){
                $("#subNav li:eq("+(i+1)+")").addClass("active").siblings().removeClass("active");
                return;
            }
        }
    })

})