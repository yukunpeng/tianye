<?php
require_once("SqlManager.php");

class MagazineManager{

    /**
     * 修改历程
     */
    public function updateMagazine($id,$title,$year,$thum,$content){
        SqlManager::getIns()->connect();
        mysql_query("update tb_magazine set _title='$title',_year='$year',_thum='$thum',_content='$content' where _id='$id'");
    }


    public function getMagazineById($id){
        SqlManager::getIns()->connect();
        //前台要数据
        return mysql_query("select * from tb_magazine where _id=$id");
    }

    /**
     * 删除历程
     */
    public function deleteMagazine($id){
        SqlManager::getIns()->connect();
        mysql_query("delete from tb_magazine where _id=$id");
    }


    /**
     * 获取新闻的总页数
     */
    public function getMagazineList(){
        SqlManager::getIns()->connect();
        //前台要数据
        return mysql_query("select * from tb_magazine");
    }

    /**
     * 添加历史
     */
    public function addMagazine($title,$year,$thum,$content){
        SqlManager::getIns()->connect();
        $newsPos=$this->getMaxPos()+1;

        mysql_query("insert into tb_magazine (_title,_year,_thum,_content,_pos) values ('$title','$year','$thum','$content','$newsPos')");
    }

    private function getMaxPos(){
        SqlManager::getIns()->connect();
        $result=mysql_query("select _pos from tb_magazine");
        $maxPos=0;
        while($row=mysql_fetch_array($result)){
            if($row["_pos"]>$maxPos){
                $maxPos=$row["_pos"];
            }
        }
        return $maxPos;
    }

}
?>