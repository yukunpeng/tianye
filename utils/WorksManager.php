<?php
require_once("SqlManager.php");

class WorksManager{
    //每页显示的新闻条数
    private $numOnePage=15;
    /*获取类单例*/
    private static $ins;
    public static function getIns(){
        if(!WorksManager::$ins){
            WorksManager::$ins=new WorksManager();
        }
        return WorksManager::$ins;
    }

    public function updateWorkRecommend($id,$shows){
        SqlManager::getIns()->connect();
        mysql_query("update tb_works set _recommend=$shows where _id=$id");
    }

    /**
     * 获取作品总页数
     */
    public function getWorksSumPage($isBack,$type){
        SqlManager::getIns()->connect();
        if($isBack){
            $result=mysql_query("select _id from tb_works");
        }else{
            if($type==1000){
                //不限制作品分类
                $result=mysql_query("select _id from tb_works where _shows=1");
            }else{
                //显示分类
                $result=mysql_query("select _id from tb_works where _shows=1 and _type=$type");
            }
        }

        //向上取整求页数
        return ceil(mysql_num_rows($result)/$this->numOnePage);
    }

    /**
     * 获取指定页的作品
     */
    public function getWorksListByPage($page,$isBack,$type){
        SqlManager::getIns()->connect();
        $offset=$this->numOnePage*($page-1);
        if($isBack){
            $result=mysql_query("select _id,_recommend,_title,_author,_time,_shows,_sort,_type,_thumPath,_desc from tb_works order by _sort DESC limit $offset,$this->numOnePage");
        }else{
            if($type==1000){
                $result=mysql_query("select _id,_title,_author,_time,_shows,_sort,_type,_thumPath,_desc from tb_works where _shows=1 order by _sort DESC limit $offset,$this->numOnePage");
            }else{
                $result=mysql_query("select _id,_title,_author,_time,_shows,_sort,_type,_thumPath,_desc from tb_works where _shows=1 and _type like '%$type%' order by _sort DESC limit $offset,$this->numOnePage");
            }
        }
        return $result;
    }
    /**
     * 获取指定页的作品
     */
    public function getWorksRecommend(){
        SqlManager::getIns()->connect();
        $result=mysql_query("select _id,_title,_author,_time,_shows,_sort,_type,_thumPath,_desc from tb_works where _recommend=1 order by _sort DESC limit 10");
        return $result;
    }
    /**
     * @return resource
     * 获取作品分类列表
     */
    public function getWorkTypeList(){
        SqlManager::getIns()->connect();
        return mysql_query("select * from tb_worksType order by _pos asc");
    }
    /**
     * 根据分类id获取作品分类名字
     */
    public function getWorkTypeNameByType($type){
        SqlManager::getIns()->connect();
        $result=mysql_query("select _value from tb_worksType where _type=$type");
        while($row=mysql_fetch_array($result)){
            return $row["_value"];
        }
    }
    /**
     * 获得指定id的作品内容
     */
    public function getWorkById($id){
        //新闻标题数组
        SqlManager::getIns()->connect();
        $result=mysql_query("select * from tb_works where _id=$id");
        while($row=mysql_fetch_array($result)){
            return $row;
        }
    }

    //==========================================================================
    /**
     * 获得指定sort下一条的作品内容
     */
    public function getNextWorkContent($sort,$type){
        SqlManager::getIns()->connect();
        if($type==1000){
            $result=mysql_query("select * from tb_works where _sort<$sort and _shows=1 order by _sort DESC LIMIT 1");
        }else{
            $result=mysql_query("select * from tb_works where _sort<$sort and _shows=1 and _type=$type order by _sort DESC LIMIT 1");
        }

        if($row=mysql_fetch_array($result)){
            return $row;
        }
        //下一条作品不存在，获取第一条
        if($type=1000){
            $result=mysql_query("select * from tb_works where _shows=1 order by _sort DESC LIMIT 1");
        }else{
            $result=mysql_query("select * from tb_works where _shows=1 and _type=$type order by _sort DESC LIMIT 1");
        }

        return mysql_fetch_array($result);
    }
    /**
     * 获得指定sort下一条的作品标题
     */
    public function getNextWorkTitle($sort,$type){
        SqlManager::getIns()->connect();
        if($type==1000){
            $result=mysql_query("select _title,_id from tb_works where _sort<$sort and _shows=1 order by _sort DESC LIMIT 1");
        }else{
            $result=mysql_query("select _title,_id from tb_works where _sort<$sort and _shows=1 and _type=$type order by _sort DESC LIMIT 1");
        }
        if($row=mysql_fetch_array($result)){
            return $row;
        }

        //下一条作品不存在，获取第1条
        if($type==1000){
            $result=mysql_query("select _title,_id from tb_works where _shows=1 order by _sort DESC LIMIT 1");
        }else{
            $result=mysql_query("select _title,_id from tb_works where _shows=1 and _type=$type order by _sort DESC LIMIT 1");
        }
        return mysql_fetch_array($result);
    }
    /**
     * 获得指定sort上一条的作品内容
     */
    public function getPreWorkContent($sort,$type){
        SqlManager::getIns()->connect();
        if($type=1000){
            $result=mysql_query("select * from tb_works where _sort>$sort and shows=1 order by _sort ASC LIMIT 1");
        }else{
            $result=mysql_query("select * from tb_works where _sort>$sort and shows=1 and _type=$type order by _sort ASC LIMIT 1");
        }
        if($row=mysql_fetch_array($result)){
            return $row;
        }
        //上一条作品不存在，获取最后1条
        if($type=1000){
            $result=mysql_query("select * from tb_works where shows=1 order by _sort ASC LIMIT 1");
        }else{
            $result=mysql_query("select * from tb_works where shows=1 and _type=$type order by _sort ASC LIMIT 1");
        }
        return mysql_fetch_array($result);
    }
    /**
     * 获得指定sort上一条的新闻标题
     */
    public function getPreWorkTitle($sort,$type){
        SqlManager::getIns()->connect();
        if($type=1000){
            $result=mysql_query("select _id,_title from tb_works where _sort>$sort and _shows=1 order by _sort ASC LIMIT 1");
        }else{
            $result=mysql_query("select _id,_title from tb_works where _sort>$sort and _shows=1 and _type=$type order by _sort ASC LIMIT 1");
        }
        if($row=mysql_fetch_array($result)){
            return $row;
        }

        //上一条作品不存在，获取最后1条
        if($type=1000){
            $result=mysql_query("select _id,_title from tb_works where _shows=1 order by _sort ASC LIMIT 1");
        }else{
            $result=mysql_query("select _id,_title from tb_works where _shows=1 and _type=$type order by _sort ASC LIMIT 1");
        }
        return mysql_fetch_array($result);
    }
    /**
     * 修改指定id的作品
     */
    public  function updateWork($id,$title,$content,$type,$show,$time,$recommend){
        SqlManager::getIns()->connect();
        mysql_query("update tb_works set _recommend=$recommend,_title='$title',_content='$content',_type='$type',_shows='$show',_time='$time' where _id='$id'");
    }
    /**
     * 修改指定id的作品
     */
    public  function updateWorkThum($id,$title,$content,$thum,$type,$show,$time,$recommend){
        SqlManager::getIns()->connect();
        mysql_query("update tb_works set _recommend=$recommend,_title='$title',_thumPath='$thum',_content='$content',_type='$type',_shows='$show',_time='$time' where _id='$id'");
    }
    /**
     * 删除作品
     */
    public function deleteWork($id){
        SqlManager::getIns()->connect();
        mysql_query("delete from tb_works where _id=$id");
    }
    /**
     * 添加作品
     */
    public function addWork($title,$content,$type,$show,$thumPath,$time,$recommend){
        SqlManager::getIns()->connect();
        $newsSort=$this->getMaxWorksSort()+1;
        $author="余坤朋";
        mysql_query("insert into tb_works (_sort,_title,_content,_time,_author,_type,_shows,_thumPath,_recommend) values ('$newsSort','$title','$content','$time','$author','$type','$show','$thumPath','$recommend')");
        $result=mysql_query("select _id from tb_works where _sort=$newsSort");
        $row=mysql_fetch_array($result);
        return $row["_id"];
    }
    public function updateWorkShow($id,$shows){
        SqlManager::getIns()->connect();
        mysql_query("update tb_works set _shows=$shows where _id=$id");
    }
    /**
     * 获得最大sort
     */
    private function getMaxWorksSort(){
        SqlManager::getIns()->connect();
        $result=mysql_query("select _sort from tb_works");
        $maxSort=0;
        while($row=mysql_fetch_array($result)){
            if($row["_sort"]>$maxSort){
                $maxSort=$row["_sort"];
            }
        }
        return $maxSort;
    }
}
?>