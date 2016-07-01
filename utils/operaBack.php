<?php
session_start();
/**
 * cmd命令大全
 * 1，保存编辑后的新闻
 * 2，删除指定id新闻
 * 3，添加新闻
 * 4，修改指定id新闻显示状态
 * 6，登录
 * 9，添加作品
 * 10,修改指定id作品显示状态
 * 11，保存编辑后的作品
 * 12，删除指定id作品
 * 13，获取指定sort的作品json
 * 14，获取下一条作品json
 * 15，获取上一条作品json
 * 16，首页推荐作品
 */
require_once("Tools.php");
require_once("NewsManager.php");
require_once("WorksManager.php");
require_once("HistoryManager.php");
require_once("LoginManager.php");
require_once("MagazineManager.php");
require_once("BannerManager.php");

$newsManager=new NewsManager();
$worksManager=new WorksManager();
$historyManager=new HistoryManager();
$magazineManager=new MagazineManager();
$bannerManager=new BannerManager();

//获得操作命令
if(isset($_GET["cmd"])){
    $cmd=$_GET["cmd"];
}else{
    $cmd=$_POST["cmd"];
}

switch($cmd){
    case 0:

        break;
    case 1:
        //保存编辑后的新闻
        $id=$_POST["id"];
        $title=$_POST["title"];
        $content=$_POST["content"];
        $desc=$_POST["desc"];
        $type=$_POST["type"];
        $show=$_POST["shows"];
        $time=$_POST["time"];

        if ($_FILES["thum"]["error"] == 0){
            //保存缩略图名字
            $fileName=date("Ymd_hisa",time());
            $nameArr=explode(".",$_FILES["thum"]["name"]);
            $dix=getDix($nameArr);
            $fileName=$fileName.$dix;
            //缩略图目录,不存在则创建
            $dirName=date("Ymd");
            $dirPath="../back/thum/".$dirName."/";
            if(!is_dir($dirPath))mkdir($dirPath);
            move_uploaded_file($_FILES["thum"]["tmp_name"],$dirPath.$fileName);
            $thumPath="/back/thum/".$dirName."/".$fileName;
            $newsManager->updateNewThum($id,$title,$content,$thumPath,$type,$show,$desc,$time);
        }else{
            $newsManager->updateNew($id,$title,$content,$type,$show,$desc,$time);
        }
        header("Location: ../back/news_view.php?id=".$id);
        break;
    case 2:
        //删除指定id的新闻
        $newsManager->deleteNew($_GET["id"]);
        header("Location: ../back/news_list.php");
        break;
    case 3:
        if ($_FILES["thum"]["error"] > 0){
            $thumPath="nopic";
        }else{
            //保存缩略图名字
            $fileName=date("Ymd_hisa",time());
            $nameArr=explode(".",$_FILES["thum"]["name"]);
            $dix=getDix($nameArr);
            $fileName=$fileName.$dix;
            //缩略图目录,不存在则创建
            $dirName=date("Ymd");
            $dirPath="../back/thum/".$dirName."/";
            if(!is_dir($dirPath))mkdir($dirPath);
            move_uploaded_file($_FILES["thum"]["tmp_name"],$dirPath.$fileName);
            $thumPath="/back/thum/".$dirName."/".$fileName;
        }

        //向数据库插入数据
        //添加新闻
        $title=$_POST["title"];
        $content=$_POST["content"];
        $desc=$_POST["desc"];
        $type=$_POST["type"];
        $show=$_POST["shows"];
        $time=$_POST["time"];
        $newId = $newsManager->addNew($title,$content,$type,$show,$thumPath,$desc,$time);
        header("Location: ../back/news_view.php?id=".$newId);
        break;
    case 4:
        //修改指定id的新闻显示状态
        $newsManager->updateNewShow($_GET["id"],$_GET["shows"]);
        header("Location: ../back/news_list.php?page=".$_GET["page"]);
        break;

    case 6:
        //登录
        if( LoginManager::getIns()->login($_POST["userName"],$_POST["passWord"])){
            $_SESSION["isLogin"]=1;
            header("Location: ../back/function_list.php");
        }else{
            header("Location: ../back/login.php?isWrong=1");
        }
        break;
    case 9:
        //添加作品
        if ($_FILES["thum"]["error"] > 0){
            $thumPath="nopic";
        }else{
            //保存缩略图名字
            $fileName=date("Ymd_hisa",time());
            $nameArr=explode(".",$_FILES["thum"]["name"]);
            $dix=getDix($nameArr);

            $fileName=$fileName.$dix;
            //缩略图目录,不存在则创建
            $dirName=date("Ymd");
            $dirPath="../back/thum/".$dirName."/";
            if(!is_dir($dirPath))mkdir($dirPath);
            move_uploaded_file($_FILES["thum"]["tmp_name"],$dirPath.$fileName);

            $thumPath="/back/thum/".$dirName."/".$fileName;
        }

        $title=$_POST["title"];
        $content=$_POST["content"];
        $show=$_POST["shows"];
        $time=$_POST["time"];
        if(isset($_POST["recommend"])){
            $recommend=1;
        }else{
            $recommend=0;
        }
        $type="";
        for($i=1;$i<10;$i++){
            if(isset($_POST["$i"])){
                $type=$type.$i;
            }
        }
        if($type==""){
            echo "please choose type !";
            return;
        }

        $newId = $worksManager->addWork($title,$content,$type,$show,$thumPath,$time,$recommend);
        header("Location: ../back/works_view.php?id=".$newId);
        break;
    case 10:
        //修改指定id的作品显示状态
        $worksManager->updateWorkShow($_GET["id"],$_GET["shows"]);
        header("Location: ../back/works_list.php?page=".$_GET["page"]);
        break;
    case 11:
        //保存编辑后的作品
        $type="";
        for($i=1;$i<10;$i++){
            if(isset($_POST["$i"])){
                $type=$type.$i;
            }
        }
        if($type==""){
            echo "please choose type !";
            return;
        }
        $id=$_POST["id"];
        $title=$_POST["title"];
        $content=$_POST["content"];
        $show=$_POST["shows"];
        $time=$_POST["time"];
        if(isset($_POST["recommend"])){
            $recommend=1;
        }else{
            $recommend=0;
        }

        if ($_FILES["thum"]["error"] == 0){
            //保存缩略图名字
            $fileName=date("Ymd_hisa",time());
            $nameArr=explode(".",$_FILES["thum"]["name"]);
            $dix=getDix($nameArr);
            $fileName=$fileName.$dix;
            //缩略图目录,不存在则创建
            $dirName=date("Ymd");
            $dirPath="../back/thum/".$dirName."/";
            if(!is_dir($dirPath))mkdir($dirPath);
            move_uploaded_file($_FILES["thum"]["tmp_name"],$dirPath.$fileName);
            $thumPath="/back/thum/".$dirName."/".$fileName;

            $worksManager->updateWorkThum($id,$title,$content,$thumPath,$type,$show,$time,$recommend);
        }else{
            $worksManager->updateWork($id,$title,$content,$type,$show,$time,$recommend);
        }

        header("Location: ../back/works_view.php?id=".$id);
        break;
    case 12:
        //删除指定id的作品
        $worksManager->deleteWork($_GET["id"]);
        header("Location: ../back/works_list.php");
        break;
    case 13:
        //获取指定sort的作品json
        if($_GET["workNewType"]==1) {
            $row = $sqlManager->getWorkContentBySort($_GET["sort"]);
            $typeName = $sqlManager->getWorksTypeName($row["_type"]);
        }else{
            $row = $sqlManager->getNewContentBySort($_GET["sort"]);
            $typeName = $sqlManager->getNewsTypeName($row["_type"]);
        }
        $str=$row["_title"]."m||m".$row["_content"]."m||m".$row["_author"]."m||m".$typeName."m||m".$row["_time"]."m||m".$row["_sort"];
        echo $str;
        break;

    case 14:
        //获取下一条作品json
        if($_GET["workNewType"]==1){
            $row=$sqlManager->getWorkContentNextSort($_GET["sort"]);
            $typeName=$sqlManager->getWorksTypeName($row["_type"]);
        }else{
            $row=$sqlManager->getNewContentNextSort($_GET["sort"]);
            $typeName=$sqlManager->getNewsTypeName($row["_type"]);
        }
        $str=$row["_title"]."m||m".$row["_content"]."m||m".$row["_author"]."m||m".$typeName."m||m".$row["_time"]."m||m".$row["_sort"];
        echo $str;
        break;

    case 15:
        //获取上一条作品json
        if($_GET["workNewType"]==1) {
            $row=$sqlManager->getWorkContentPreSort($_GET["sort"]);
            $typeName=$sqlManager->getWorksTypeName($row["_type"]);
        }else{
            $row=$sqlManager->getNewContentPreSort($_GET["sort"]);
            $typeName=$sqlManager->getNewsTypeName($row["_type"]);
        }
        $str=$row["_title"]."m||m".$row["_content"]."m||m".$row["_author"]."m||m".$typeName."m||m".$row["_time"]."m||m".$row["_sort"];
        echo $str;
        break;
    case 16:
        //修改指定id的作品首页是否显示
        $worksManager->updateWorkRecommend($_GET["id"],$_GET["shows"]);
        header("Location: ../back/works_list.php?page=".$_GET["page"]);
        break;
    case 17:
        //添加历史
        $title=$_POST["title"];
        $content=$_POST["content"];
        $historyManager->addHistory($title,$content);
        header("Location: ../back/history_list.php");
        break;
    case 18:
        //修改历史
        $id=$_POST["id"];
        $title=$_POST["title"];
        $content=$_POST["content"];
        $historyManager->updateHistory($id,$title,$content);
        header("Location: ../back/history_list.php");
        break;
    case 19:
        //删除历史
        $id=$_GET["id"];
        $historyManager->deleteHistory($id);
        header("Location: ../back/history_list.php");
        break;
    case 20:
        //添加杂志
        $thumPathArr=array();
        for($i=0;$i<5;$i++){
            if ($_FILES["page".$i]["error"] > 0){
                echo "error!";
                return;
            }
            //保存缩略图名字
            $fileName=date("Ymd_hisa",time())."_".$i;
            $nameArr=explode(".",$_FILES["page".$i]["name"]);
            $dix=getDix($nameArr);

            $fileName=$fileName.$dix;
            //缩略图目录,不存在则创建
            $dirName=date("Ymd");
            $dirPath="../back/thum/".$dirName."/";
            if(!is_dir($dirPath))mkdir($dirPath);
            move_uploaded_file($_FILES["page".$i]["tmp_name"],$dirPath.$fileName);
            $thumPath="/back/thum/".$dirName."/".$fileName;
            array_push($thumPathArr,$thumPath);
        }
        $title=$_POST["title"];
        $year=$_POST["year"];
        $thum=$thumPathArr[0];

        $content=$thumPathArr[1]."|_|".$thumPathArr[2]."|_|".$thumPathArr[3]."|_|".$thumPathArr[4];
        $magazineManager->addMagazine($title,$year,$thum,$content);
        header("Location: ../back/magazine_list.php?");
        break;
    case 21:
        //删除杂志
        $id=$_GET["id"];
        $magazineManager->deleteMagazine($id);
        header("Location: ../back/magazine_list.php");
        break;
    case 22:
        //修改杂志
        $magazineManager=new MagazineManager();
        $result = $magazineManager->getMagazineById($_POST["id"]);
        $row=mysql_fetch_array($result);

        //缩略图
        $thum=$row["_thum"];
        $pageStr=$row["_content"];
        $thumPathArr=explode("|_|",$pageStr);
        for($i=0;$i<5;$i++){
            //没有上传新图片，忽略继续
            if ($_FILES["page".$i]["error"] > 0){
                continue;
            }
            //上传了新图片
            //保存缩略图名字
            $fileName=date("Ymd_hisa",time())."_".$i;
            $nameArr=explode(".",$_FILES["page".$i]["name"]);
            $dix=getDix($nameArr);

            $fileName=$fileName.$dix;
            //缩略图目录,不存在则创建
            $dirName=date("Ymd");
            $dirPath="../back/thum/".$dirName."/";
            if(!is_dir($dirPath))mkdir($dirPath);
            move_uploaded_file($_FILES["page".$i]["tmp_name"],$dirPath.$fileName);
            $thumPath="/back/thum/".$dirName."/".$fileName;
            if($i==0){
                $thum=$thumPath;
            }else{
                $thumPathArr[$i-1]=$thumPath;
            }
        }
        $title=$_POST["title"];
        $year=$_POST["year"];
        $content=$thumPathArr[0]."|_|".$thumPathArr[1]."|_|".$thumPathArr[2]."|_|".$thumPathArr[3];
        $magazineManager->updateMagazine($_POST["id"],$title,$year,$thum,$content);
        header("Location: ../back/magazine_list.php");
        break;
    case 23:
        //添加banner
        if ($_FILES["pic"]["error"] > 0){
            echo "error:no pic !";
            return;
        }else{
            //保存缩略图名字
            $fileName=date("Ymd_hisa",time());
            $nameArr=explode(".",$_FILES["pic"]["name"]);
            $dix=getDix($nameArr);

            $fileName=$fileName.$dix;
            //缩略图目录,不存在则创建
            $dirName=date("Ymd");
            $dirPath="../back/thum/".$dirName."/";
            if(!is_dir($dirPath))mkdir($dirPath);
            move_uploaded_file($_FILES["pic"]["tmp_name"],$dirPath.$fileName);

            $picPath="/back/thum/".$dirName."/".$fileName;
        }
        if(isset($_POST["show"])){
            $show=1;
        }else{
            $show=0;
        }

        $title=$_POST["title"];
        $url=$_POST["url"];
       $bannerManager->addBanner($title,$picPath,$url,$show);
        header("Location: ../back/banner_list.php?");
        break;
    case 24:
        //删除banner
        $bannerManager->deleteBanner($_GET["id"]);
        header("Location: ../back/banner_list.php?");
        break;
    case 25:
        //修改banner
        if(isset($_POST["show"])){
            $show=1;
        }else{
            $show=0;
        }

        $title=$_POST["title"];
        $url=$_POST["url"];
        //修改banner
        if ($_FILES["pic"]["error"] > 0){
            //缩略图不变
            $bannerManager->updateBanner($_POST["id"],$title,$url,$show);
        }else{
            //保存缩略图名字
            $fileName=date("Ymd_hisa",time());
            $nameArr=explode(".",$_FILES["pic"]["name"]);
            $dix=getDix($nameArr);

            $fileName=$fileName.$dix;
            //缩略图目录,不存在则创建
            $dirName=date("Ymd");
            $dirPath="../back/thum/".$dirName."/";
            if(!is_dir($dirPath))mkdir($dirPath);
            move_uploaded_file($_FILES["pic"]["tmp_name"],$dirPath.$fileName);
            $picPath="/back/thum/".$dirName."/".$fileName;
            $bannerManager->updateBannerPic($_POST["id"],$title,$picPath,$url,$show);
        }
        header("Location: ../back/banner_list.php?");
        break;
}
function getDix($nameArr){
    $dix="";
    if(in_array("jpg",$nameArr))$dix=".jpg";
    if(in_array("JPG",$nameArr))$dix=".JPG";
    if(in_array("jpeg",$nameArr))$dix=".jpeg";
    if(in_array("png",$nameArr))$dix=".png";
    if(in_array("gif",$nameArr))$dix=".gif";
    return $dix;
}
?>

