<?php
require_once("SqlManager.php");

class NewsManager{
    //每页显示的新闻条数
    private $numOnePage=5;

    /**
     * 获取新闻的总页数
     */
    public function getNewsSumPage($isBack){
        SqlManager::getIns()->connect();
        if($isBack){
            //后台要数据
            $result=mysql_query("select _id from tb_news");
        }else{
            //前台要数据
            $result=mysql_query("select _id from tb_news where _shows=1");
        }
        return  ceil(mysql_num_rows($result)/$this->numOnePage);
    }

    /**
     * 获取指定页的新闻
     */
    public function getNewsListByPage($page,$isBack){
        SqlManager::getIns()->connect();
        $offset=$this->numOnePage*($page-1);
        if($isBack){
            //后台
            $result=mysql_query("select _id,_title,_author,_time,_shows,_sort,_type,_thumPath,_desc from tb_news order by _sort DESC limit $offset,$this->numOnePage");
        }else{
            //前台
            $result=mysql_query("select _id,_title,_author,_time,_shows,_sort,_type,_thumPath,_desc from tb_news where _shows=1 order by _sort DESC limit $offset,$this->numOnePage");
        }
        return $result;
    }

    /**
     * 获取新闻分类列表
     */
    public function getNewTypeList(){
        SqlManager::getIns()->connect();
        return mysql_query("select * from tb_newsType");
    }
    /**
     * 根据分类type获取新闻分类名字
     */
    public function getNewTypeNameByType($type){
        SqlManager::getIns()->connect();
        $result=mysql_query("select _value from tb_newsType where _type=$type");
        while($row=mysql_fetch_array($result)){
            return $row["_value"];
        }
    }

    /**
     * 获得指定id的新闻内容
     */
    public function getNewById($id){
        //新闻标题数组
        SqlManager::getIns()->connect();
        $result=mysql_query("select * from tb_news WHERE _id=$id");
        while($row=mysql_fetch_array($result)){
            return $row;
        }
    }
    /**
     * 获得指定sort下一条的新闻内容
     */
    public function getNextNewContent($sort){
        SqlManager::getIns()->connect();
        $result=mysql_query("select * from tb_news where _sort<$sort and _shows=1 order by _sort DESC LIMIT 1");

        if($row=mysql_fetch_array($result)){
            return $row;
        }
        //下一条新闻不存在，获取第一条
        $result=mysql_query("select * from tb_news where _shows=1 order by _sort DESC LIMIT 1");
        return mysql_fetch_array($result);
    }
    /**
     * 获得指定sort下一条的新闻标题
     */
    public function getNextNewTitle($sort){
        SqlManager::getIns()->connect();
        $result=mysql_query("select _title,_id from tb_news where _sort<$sort and _shows=1 order by _sort DESC LIMIT 1");

        if($row=mysql_fetch_array($result)){
            return $row;
        }
        //下一条新闻不存在，获取第一条
        $result=mysql_query("select _title,_id from tb_news where _shows=1 order by _sort DESC LIMIT 1");
        return mysql_fetch_array($result);
    }
    /**
     * 获得指定sort上一条的新闻内容
     */
    public function getPreNewContent($sort){
        SqlManager::getIns()->connect();
        $result=mysql_query("select * from tb_news where _sort>$sort and shows=1 order by _sort ASC LIMIT 1");
        if($row=mysql_fetch_array($result)){
            return $row;
        }
        //上一条新闻不存在，获取最后1条
        $result=mysql_query("select * from tb_news where shows=1 order by _sort ASC LIMIT 1");
        return mysql_fetch_array($result);
    }
    /**
     * 获得指定sort上一条的新闻标题
     */
    public function getPreNewTitle($sort){
        SqlManager::getIns()->connect();
        $result=mysql_query("select _id,_title from tb_news where _sort>$sort and _shows=1 order by _sort ASC LIMIT 1");
        if($row=mysql_fetch_array($result)){
            return $row;
        }
        //上一条新闻不存在，获取最后1条
        $result=mysql_query("select _id,_title from tb_news where _shows=1 order by _sort ASC LIMIT 1");
        return mysql_fetch_array($result);
    }

    /**
     * 修改指定id的新闻
     */
    public  function updateNew($id,$title,$content,$type,$show,$desc,$time){
        SqlManager::getIns()->connect();
        mysql_query("update tb_news set _title='$title',_content='$content',_desc='$desc',_type='$type',_shows='$show',_time='$time' where _id='$id'");
    }
    /**
     * 修改指定id的新闻
     */
    public  function updateNewThum($id,$title,$content,$thum,$type,$show,$desc,$time){
        SqlManager::getIns()->connect();
        mysql_query("update tb_news set _title='$title',_content='$content',_thumPath='$thum',_desc='$desc',_type='$type',_shows='$show',_time='$time' where _id='$id'");
    }
    /**
     * 删除新闻
     */
    public function deleteNew($id){
        SqlManager::getIns()->connect();
        mysql_query("delete from tb_news where _id=$id");
    }
    /**
     * 添加新闻
     */
    public function addNew($title,$content,$type,$show,$thumPath,$desc,$time){
        SqlManager::getIns()->connect();
        $newsSort=$this->getMaxNewSort()+1;
        $author="余坤朋";
        mysql_query("insert into tb_news (_sort,_title,_content,_time,_author,_type,_shows,_thumPath,_desc) values ('$newsSort','$title','$content','$time','$author','$type','$show','$thumPath','$desc')");
        $result=mysql_query("select _id from tb_news where _sort=$newsSort");
        $row=mysql_fetch_array($result);
        return $row["_id"];
    }

    public function updateNewShow($id,$shows){
        SqlManager::getIns()->connect();
        mysql_query("update tb_news set _shows=$shows where _id=$id");
    }
    /**
     * 获得最大id
     */
    private function getMaxNewSort(){
        SqlManager::getIns()->connect();
        $result=mysql_query("select _sort from tb_news");
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