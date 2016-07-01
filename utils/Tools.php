<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/30
 * Time: 11:03
 */
class Tools{
    /**
     * @param $picPath
     * @return string
     * 获得缩略图路径
     */
    static function getThumPicPath($picPath){
        if($picPath=="nopic"||$picPath=="")return "/back/thum/nopic.jpg";
        return $picPath;
    }
}

?>