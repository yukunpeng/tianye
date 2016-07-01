$(function(){
    var left=$("nav .main a.active").position().left+35;
    $("#navBg").css({
        "position":"absolute",
        "left":left
    });
    resetPosition($("nav .main a.active"));
    $("nav .main a").mouseover(function(){
        resetPosition($(this));
    })
    $("nav .main a").mouseout(function(){
        var left=$("nav .main .active").position().left+35;
        $("#navBg").stop();
        $("#navBg").animate({"left":left+"px"},300);
    })
})

function resetPosition(div){
    var left=div.position().left+35;
    $("#navBg").stop();
    $("#navBg").animate({"left":left+"px"},300);
}