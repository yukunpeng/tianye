/**
 * Created by Administrator on 2016/4/11.
 */

$(function(){
    try {
        var urlhash = window.location.hash;
        if (!urlhash.match("fromapp"))
        {
            if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i)))
            {
                $("#nav").css({
                    "position":"relative",
                    "height":"90px",
                    "marginBottom":"0"
                });
                $("#banner").css({
                    "marginTop":"0"
                })
            }else{
            }
        }
    }
    catch(err)
    {
    }
})