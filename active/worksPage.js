/**
 * Created by Administrator on 2016/4/11.
 */
var worksPage={
    init:function(){
        //初始化引用
        worksPage.wrap=$("#wrap");
        worksPage.newsPage1=$("#newsPage1");
        worksPage.newsPage2=$("#newsPage2");
        worksPage.container=$("#page2 .container");
        //作品分类
        worksPage.workAll=$("#blocksit .grid");
        worksPage.workType_1=$("#blocksit .type_1");
        worksPage.workType_2=$("#blocksit .type_2");
        worksPage.workType_3=$("#blocksit .type_3");
        worksPage.workType_4=$("#blocksit .type_4");
        worksPage.workType_5=$("#blocksit .type_5");
        //流式布局
        worksPage.currentWidth=600;
        //点击作品列表
        $("#blocksit .grid").click({workNewType:1},worksPage.worksGridClick);
        //点击关闭作品按钮
        $(".newsPage .closeBtn").click(this.closeClick);
        //点击下(上)一条作品按钮
        $(".newsPage .next").click(worksPage.nextClick);
        $(".newsPage .pre").click(worksPage.preClick);
        //点击作品分类导航
        $("#page2 .banner li").click(worksPage.workTypeNavClick);
    },
    workTypeNavClick:function(){
        $(this).addClass("active").siblings().removeClass("active");
        var curType=$(this).attr("type");
        worksPage.workAll.remove();
        switch (curType){
            case "all":
                $("#blocksit").append(worksPage.workAll);
                break;
            case "1":
                $("#blocksit").append(worksPage.workType_1);
                break;
            case "2":
                $("#blocksit").append(worksPage.workType_2);
                break;
            case "3":
                $("#blocksit").append(worksPage.workType_3);
                break;
            case "4":
                $("#blocksit").append(worksPage.workType_4);
                break;
            case "5":
                $("#blocksit").append(worksPage.workType_5);
                break;
        }
        $("#blocksit .grid").click({workNewType:1},worksPage.worksGridClick);
        worksPage.resetWinSize();
        worksPage.waterFall();
    },
    nextClick:function(){
        tools.showLoading();
        //动画
        tools.outToLeft(worksPage.curNewPage);
        worksPage.curNewPage=worksPage.getOtherNewsPage();
        worksPage.curNewPage.show();
        tools.intoFromRight(worksPage.curNewPage);
        //清除当前内容页
        worksPage.clearContent();
        //获取下一条作品
        $.get("utils/operaBack.php", {sort:worksPage.curSort, cmd:14,workNewType:tools.workNewType},worksPage.onGetData);
    },
    preClick:function(){
        tools.showLoading();
        //动画
        tools.outToRight(worksPage.curNewPage);
        worksPage.curNewPage=worksPage.getOtherNewsPage();
        worksPage.curNewPage.show();
        tools.intoFromLeft(worksPage.curNewPage);
        //清除当前内容页
        worksPage.clearContent();
        //获取上一条作品
        $.get("utils/operaBack.php", {sort:worksPage.curSort, cmd:15,workNewType:tools.workNewType},worksPage.onGetData);
    },
    //点击作品列表
    worksGridClick:function(e){
        tools.workNewType= e.data.workNewType;
        //设置当前新闻页
        worksPage.curNewPage=worksPage.newsPage1;
        //显示等待移入的新闻内页
        worksPage.hideAllNewPage();
        worksPage.curNewPage.show();
        //播放动画
        tools.outToLeft(worksPage.wrap);
        tools.intoFromRight(worksPage.curNewPage);

        //获得目标作品sort
        worksPage.curSort=$(this).attr("worksSort");
        //清除当前内容页
        worksPage.clearContent();
        tools.showLoading();
        //获取指定sort的作品
        $.get("utils/operaBack.php", {sort:worksPage.curSort, cmd:13,workNewType:tools.workNewType},worksPage.onGetData);
    },
    onGetData:function(data){
        tools.hideLoading();
        var arr = data.split("m||m");
        worksPage.curNewPage.find(".left .title").html(arr[0]);
        //worksPage.curNewPage.find(".left .subTitle").html("分类："+arr[3]+" | 作者："+arr[2]+" | 创建时间："+arr[4]);
        worksPage.curNewPage.find(".left .content").html(arr[1]);

        worksPage.curNewPage.find(".right .title").html(arr[0]);
        worksPage.curNewPage.find(".right .author").html(arr[2]);
        worksPage.curNewPage.find(".right .type").html(arr[3]);
        worksPage.curNewPage.find(".right .time").html(arr[4]);
        //保存当前新闻sort
        worksPage.curSort=arr[5];
    },
    //重置页面内容
    clearContent:function(){
        //left
        worksPage.curNewPage.find(".left .title,.left .subTitle,.left .content").html("");
        //right
        worksPage.curNewPage.find(".right .title,.right .author,.right .type,.right .time").html("");
    },
    hideAllNewPage:function(){
        this.newsPage1.hide();
        this.newsPage2.hide();
    },
    //关闭作品页
    closeClick:function(){
        tools.intoFromLeft(worksPage.wrap);
        tools.outToRight(worksPage.curNewPage);
    },
    //------------没用的方法---------------------------------
    //获得下一个新闻页
    getOtherNewsPage:function(){
        if(worksPage.curNewPage.attr("id")=="newsPage1"){
            return worksPage.newsPage2;
        }
        return worksPage.newsPage1;
    },
    //--------------流式布局---------------------------
    resetWinSize:function(){
        //重置container尺寸
        worksPage.container.css("width",$("#page2").width()-10+"px");
        worksPage.container.css("height",$("#page2").height()-10+"px");
    },
    waterFall:function(){
        var winWidth = $("#page2").width();
        var conWidth;
        if(winWidth < 660) {
            conWidth = 440;
            col = 2
        } else if(winWidth < 880) {
            conWidth = 660;
            col = 3
        } else if(winWidth < 1100) {
            conWidth = 880;
            col = 4;
        } else {
            conWidth = 1100;
            col = 5;
        }
        if(conWidth != worksPage.currentWidth) {
            currentWidth = conWidth;
            $('#blocksit').width(conWidth);
            $('#blocksit').BlocksIt({
                numOfCol: col,
                offsetX: 8,
                offsetY: 8
            });
        }
    }


}