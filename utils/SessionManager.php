<?php
class SessionManager{

    public function isLogin(){
        if(isset($_SESSION["isLogin"])){
            return 1;
        }
        return 0;
    }
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
        if(!SessionManager::$ins){
            SessionManager::$ins=new SessionManager();
        }
        return SessionManager::$ins;
    }
}
?>