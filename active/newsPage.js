/**
 * Created by Administrator on 2016/4/11.
 */
var newsPage={
    init:function(){
        $("#page3 .closeBtn").click(navBlock.foldBtnClick);
        $("#page3 .newsList li").mouseenter(newsPage.mouseEnterLi);
        //点击作新闻列表
        $("#page3 .newsList li").click({workNewType:2},worksPage.worksGridClick);

        $("#page3 .newsList li:first .thumP").slideDown();
    },
    //鼠标滑入新闻标题
    mouseEnterLi:function(){
        $(this).children(".thumP").stop(true,false).slideDown(200);
        $(this).siblings().stop(true,false).children(".thumP").slideUp(200);
    }
}