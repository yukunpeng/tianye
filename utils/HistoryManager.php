<?php
require_once("SqlManager.php");

class HistoryManager{

    public function getHistoryById($id){
        SqlManager::getIns()->connect();
        //前台要数据
        return mysql_query("select * from tb_history where _id=$id");
    }

    /**
     * 获取历程列表
     */
    public function getHistoryList(){
        SqlManager::getIns()->connect();
        //前台要数据
        return mysql_query("select * from tb_history order by _pos ASC ");
    }

    /**
     * 添加历程
     */
    public function addHistory($title,$content){
        SqlManager::getIns()->connect();
        $newsPos=$this->getMaxPos()+1;
        $sql="insert into tb_history (_title,_content,_pos) values ('$title','$content','$newsPos')";
        mysql_query($sql);

    }
    /**
     * 修改历程
     */
    public function updateHistory($id,$title,$content){
        SqlManager::getIns()->connect();
        mysql_query("update tb_history set _title='$title',_content='$content' where _id='$id'");
    }
    /**
     * 删除历程
     */
    public function deleteHistory($id){
        SqlManager::getIns()->connect();
        mysql_query("delete from tb_history where _id=$id");
    }

    //获取最大pos
    private function getMaxPos(){
        SqlManager::getIns()->connect();
        $result=mysql_query("select _pos from tb_history");
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