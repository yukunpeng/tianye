<?php
require_once("SqlManager.php");

class BannerManager{

    /**
     * 修改历程
     */
    public function updateBanner($id,$title,$url,$show){
        SqlManager::getIns()->connect();
        mysql_query("update tb_banner set _title='$title',_url='$url',_show='$show' where _id='$id'");
    }
    public function updateBannerPic($id,$title,$picPath,$url,$show){
        SqlManager::getIns()->connect();
        mysql_query("update tb_banner set _title='$title',_picpath='$picPath',_url='$url',_show='$show' where _id='$id'");
    }


    public function getBannerById($id){
        SqlManager::getIns()->connect();
        //前台要数据
        return mysql_query("select * from tb_banner where _id=$id");
    }

    /**
     * 删除banner
     */
    public function deleteBanner($id){
        SqlManager::getIns()->connect();
        mysql_query("delete from tb_banner where _id=$id");
    }


    /**
     * 后台获取banner列表
     */
    public function getBannerList(){
        SqlManager::getIns()->connect();
        return mysql_query("select * from tb_banner");
    }
    /**
     * 前台获取banner列表
     */
    public function getBannerListFront(){
        SqlManager::getIns()->connect();
        return mysql_query("select * from tb_banner where _show=1");
    }

    /**
     * 添加banner
     */
    public function addBanner($title,$picPath,$url,$show){
        SqlManager::getIns()->connect();
        mysql_query("insert into tb_banner (_title,_picpath,_url,_show) values ('$title','$picPath','$url','$show')");
    }
}
?>