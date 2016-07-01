<?php
require_once("SqlManager.php");
class LoginManager{
    public function login($userName,$passWord){
        SqlManager::getIns()->connect();
        $result=mysql_query("select userName from tb_users where userName='$userName' and passWord='$passWord' limit 1");
        if(mysql_fetch_array($result)){
            return true;
        }
        return false;
    }

    /*获取类单例*/
    private static $ins;
    public static function getIns(){
        if(!LoginManager::$ins){
            LoginManager::$ins=new LoginManager();
        }
        return LoginManager::$ins;
    }

}
?>