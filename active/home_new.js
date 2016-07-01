/**
 * Created by Administrator on 2016/4/29.
 */
var home_new={
    init:function(){
        //banner
        home_new.initBanner();
        home_new.initCase();
        home_new.initTeam();
        home_new.initHoner();
        //鼠标滚轮触发
        home_new.initScroll();

        $("#case .more").click(function(){
            var goalY=$("#team").offset().top-$("#nav").height();
            $("html,body").animate({scrollTop:goalY+"px"},500);
        })
        $("#team .toTop").click(function(){
            $("html,body").animate({scrollTop:0},500);
        })
        $("#footer .toTopBlack").click(function(){
            $("html,body").animate({scrollTop:0},500);
        })
    },

    initScroll:function(){
        $(window).scroll(function(){
            if($(window).scrollTop()>=$("#about").offset().top){
                try {
                    var urlhash = window.location.hash;
                    if (!urlhash.match("fromapp")) {
                        if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i))) {

                        }else{
                            $("#nav").css("position","fixed");
                        }
                    }
                }
                catch(err)
                {
                }
            }else{
                $("#nav").css("position","absolute");
            }
        })
    },
    initCase:function(){
        var w=$("#case .container li:first-child").outerWidth()+31;
        $("#case .container").width($("#case .container li").length*w);

        $("#case .next").click(function(){
            var li=$("#case .container li:first-child");
            var s=-li.outerWidth()-10;
            li.animate({"marginLeft":s+"px"},100,function(){
                li.css("marginLeft",0);
                $("#case .container").append(li);
            });
        })
        $("#case .pre").click(function(){
            var li=$("#case .container li:last-child");
            var s=-li.outerWidth()-10;

            $("#case .container").prepend(li);
            li.css("marginLeft",s+"px");
            li.animate({"marginLeft":0},100);
        })
    },
    curPos:-1,//当前显示的总监
    initTeam:function(){
        $("#team .container").width($("#team .container li").length*195);
        $("#team .container").mouseenter(function(){
            clearInterval(home_new.teamFp);
        })
        $("#team .container").mouseleave(function(){
            home_new.beginTeamFp();
        })
        home_new.beginTeamFp();

        $("#team .next").click(function(){
            var li=$("#team .container li:first-child");
            var s=-li.outerWidth()-5;
            li.animate({"marginLeft":s+"px"},100,function(){
                li.css("marginLeft","17px");
                $("#team .container").append(li);
            });
            if(home_new.curPos!=-1){
                home_new.curPos++;
                if(home_new.curPos==10){
                    home_new.curPos=0;
                }
                home_new.showView(home_new.curPos);
            }
        })
        $("#team .pre").click(function(){
            var li=$("#team .container li:last-child");
            var s=-li.outerWidth()-5;
            $("#team .container").prepend(li);
            li.css("marginLeft",s+"px");
            li.animate({"marginLeft":"17px"},100);
            if(home_new.curPos!=-1){
                home_new.curPos--;
                if(home_new.curPos==-1){
                    home_new.curPos=9;
                }
                home_new.showView(home_new.curPos);
            }
        })
        $("#team .container li").click(function(){
            clearInterval(home_new.teamFp);
            home_new.curPos=parseFloat($(this).attr("pos"));
            home_new.showView(home_new.curPos);
        })
        $("#team .view li").click(function(){
            clearInterval(home_new.teamFp);
            home_new.beginTeamFp();
            $(this).fadeOut(100);
            home_new.curPos=-1;
            $("#glassPanel").css("display","none");
        })
        $("#glassPanel").click(function(){
            clearInterval(home_new.teamFp);
            home_new.beginTeamFp();
            $(this).fadeOut(100);
            home_new.curPos=-1;
            $("#team .view").css("display","none");
        })
    },
    teamFp:0,
    beginTeamFp:function(){
        home_new.teamFp=setInterval(function(){
            var li=$("#team .container li:first-child");
            var s=-li.outerWidth()-10;
            li.animate({"marginLeft":s+"px"},100,function(){
                li.css("marginLeft","17px");
                $("#team .container").append(li);
                if(home_new.curPos!=-1){
                    home_new.curPos++;
                    if(home_new.curPos==10){
                        home_new.curPos=0;
                    }
                    home_new.showView(home_new.curPos);
                }
            });
        },5000);
    },
    showView:function(pos){
        $("#team .view").css("display","block");
        $("#team .view li").css("display","none");
        $("#team .view li:eq("+pos+")").css("display","block");
        $("#glassPanel").css("display","block");
    },
    //banner
    initHoner:function(){
        $("#honer .container").width(3500);
        $("#honer .next").click(function(){
            var li=$("#honer .container li:first-child");
            var s=-li.outerWidth()-10;
            li.animate({"marginLeft":s+"px"},100,function(){
                li.css("marginLeft",0);
                $("#honer .container").append(li);
            });
        })
        $("#honer .pre").click(function(){
            var li=$("#honer .container li:last-child");
            var s=-li.outerWidth()-5;
            $("#honer .container").prepend(li);
            li.css("marginLeft",s+"px");
            li.animate({"marginLeft":0},100);
        })
        $("#honer .container img").click(function(){
            $("#honnerPanel").css("display","block");
            $("#honnerPanel img").attr("src",$(this).attr("src"));
            $("#honnerPanel img").css({
                "marginLeft":-$("#honnerPanel img").width()/2+"px",
                "marginTop":-$("#honnerPanel img").height()/2+"px"
            });
        })
        $("#honnerPanel").click(function(){
            $(this).css("display","none");
        })
    },

    //banner
    initBanner:function(){
        $("#banner .content li:first-child").fadeIn();
        home_new.bannerFp=setInterval(home_new.nextBanner,5000);
        //鼠标离开，开启自动切换
        $("#banner").mouseleave(function(){
            home_new.bannerFp=setInterval(home_new.nextBanner,5000);
        })
        //鼠标进入，暂停切换
        $("#banner").mouseenter(function(){
            clearInterval(home_new.bannerFp);
        });
        $("#banner .bannerLeft").click(home_new.preBanner);
        $("#banner .bannerRight").click(home_new.nextBanner);
    },
    nextBanner:function(){
        var active=$("#banner .content .active");

        var next=active.next();
        if(next.length==0){
            next=$("#banner .content li:first-child");
        }
        active.removeClass("active");
        active.fadeOut(500);
        next.addClass("active");
        next.fadeIn(500);
    },
    preBanner:function(){
        var active=$("#banner .content .active");

        var pre=active.prev();
        if(pre.length==0){
            pre=$("#banner .content li:last-child");
        }
        active.removeClass("active");
        active.fadeOut(500);
        pre.addClass("active");
        pre.fadeIn(500);
    }
}