<?php
class SqlManager{
    //主机屋
//     private $server_name="localhost";//数据库服务器名称
//    private $username="zjwdb_490501";// 连接数据库用户名
//    private $password="Yukunpeng1314";// 连接数据库密码
//    private $database="zjwdb_490501";// 数据库的名字
    //本地
//    private $server_name="localhost";//数据库服务器名称
//    private $username="root";// 连接数据库用户名
//    private $password="root";// 连接数据库密码
//    private $database="tysql2016";// 数据库的名字

    //田野
    private $server_name="202.102.86.233";//数据库服务器名称
    private $username="TYSQL2016";// 连接数据库用户名
    private $password="Py2EtaqVsCBEdHR6";// 连接数据库密码
    private $database="tysql2016";// 数据库的名字

    /**
     * 链接数据库
     */
    public function connect(){
        $con=mysql_connect($this->server_name,$this->username,$this->password);
        mysql_query("SET NAMES 'UTF8'");
        mysql_select_db($this->database,$con);
    }
    /*获取类单例*/
    private static $ins;
    public static function getIns(){
        if(!SqlManager::$ins){
            SqlManager::$ins=new SqlManager();
        }
        return SqlManager::$ins;
    }
}
?>