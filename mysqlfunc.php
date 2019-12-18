<?php
header("content-type:text/html;charset=utf-8");

function loginfo(){
$remoteip=$_SERVER['REMOTE_ADDR'];
$time=date("Y-m-d H:i:s");
if(!empty($_COOKIE['usrname'])){
$usridinfo=$_COOKIE['usrid'];
$usrnameinfo=$_COOKIE['usrname'];
}else{
$usridinfo='null';
$usrnameinfo='null';
}
$loadinfo= "$remoteip,$time,$usridinfo,$usrnameinfo;\n";
$fin=fopen('loginfo.txt','a');
fwrite($fin,$loadinfo);
fclose($fin);
}

if(PHP_OS=='WINNT'){
    $servername='101.132.235.162:3300';
}else{
    $servername='localhost';
}
$mysqlusername = 'root';
$mysqlpasswd = '123456';
$dbname = 'doe';
global $conn;
$conn = new mysqli($servername, $mysqlusername, $mysqlpasswd, $dbname);
mysqli_query($conn,'SET NAMES UTF8');
if(!empty($_GET['require'])){
    switch ($_GET['require']){
        case 'login':
            login($_POST['usrid'],$_POST['passwd'],$conn);
            break;
        case 'reg':
            reg($conn,$_POST['usrid'],$_POST['usrname'],$_POST['passwd'],$_POST['groupname']
                    ,$_POST['description']);
            break;
        case 'logout':
            logout();
            break;
        default:
            continue;
    }
}
function login($usrid, $passwd, $conn)
{
    $usrname = null;
    $sql1 = "select * from doe.usrinfo where usrid=$usrid and passwd = md5('$passwd')";
    $loginresult = mysqli_query($conn, $sql1);
    $usrname = mysqli_fetch_assoc($loginresult)['usrname'];
    if($usrname!=null){
        setcookie("usrid",$_POST['usrid'],time()+1800);
        setcookie("usrname",$usrname,time()+1800);
        echo 1;
        }else{
        echo 0;
        }
}
//login(2017,'1234',$conn);
function reg($conn,$usrid,$usrname,$passwd,$groupname,$description){
    $sql10="insert into doe.usrinfo(usrid,usrname,passwd,description,groupname)
value($usrid,'$usrname',md5('$passwd'),'$description','$groupname')";
    $result=mysqli_query($conn,$sql10);
    $response=mysqli_affected_rows($conn);
    echo $response;
}
//reg($conn,2017,'孟繁新','1234','jiangke','aaaa');

//echo login(0,'Lmt76mfx',$conn);
function logout(){
    setcookie("usrid","",time()-20);
    setcookie("usrname","",time()-20);
    echo 1;
}
function get_posts($conn)
{
    $sql2 = "select * from doe.postinfo";
    $postsresult = mysqli_query($conn, $sql2);
    $posts = mysqli_fetch_all($postsresult, MYSQLI_ASSOC);
    return $posts;
}

function get_posts_by_id($conn,$postid){
    $sql3="select * from doe.postinfo where postid=$postid";
    $postsresult = mysqli_query($conn, $sql3);
    $posts = mysqli_fetch_assoc($postsresult);
    return $posts;
}
function postcount_by_poster($conn,$posterid){
    $sql4="select count(*) from doe.postinfo where usrid=$posterid";
    $countresult=mysqli_query($conn,$sql4);
    $count=mysqli_fetch_array($countresult)[0];
    return $count;
}

function reply($conn,$postid,$usrid,$usrname,$content){
    $sql5="insert into doe.replys(postid,usrid,usrname,content,sendtime) values 
('$postid',$usrid,'$usrname','$content',now())";
    mysqli_query($conn,$sql5);
    $result=mysqli_affected_rows($conn);
    return $result;
}
function get_replys_by_postid($conn,$postid){
    $sql6="select * from doe.replys where postid=$postid";
    $replysresult = mysqli_query($conn, $sql6);
    $replys = mysqli_fetch_all($replysresult,MYSQLI_ASSOC);
    return $replys;
}
function replycount_by_postid($conn,$postid){
    $sql7="select count(*) from doe.replys where postid=$postid";
    $countresult=mysqli_query($conn,$sql7);
    $count=mysqli_fetch_array($countresult)[0];
    return $count;
}
function write_post($conn,$usrid,$usrname,$topic,$description,$tag){
    $sql8="insert into doe.postinfo (usrname,usrid,topic,description,tag,foundtime)
values('$usrname',$usrid,'$topic','$description','$tag',now())";
    mysqli_query($conn,$sql8);
    $result=mysqli_affected_rows($conn);
    return $result;
}
function get_usrinfo_by_group($conn,$group){
    $sql9="select * from doe.usrinfo where groupname='$group'";
    $result=mysqli_query($conn,$sql9);
    $namelist=mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $namelist;
}
function rank($conn,$rankinfo){
    $sql10="insert into doe.ranks (rankerid,rankername,rankedid,rankedname,r1,r2,r3,r4,r5,
r6,r7,r8,r9)value({$rankinfo['rankerid']},'{$rankinfo['rankername']}',
{$rankinfo['rankedid']},'{$rankinfo['rankedname']}','{$rankinfo['r1']}','{$rankinfo['r2']}',
'{$rankinfo['r3']}','{$rankinfo['r4']}','{$rankinfo['r5']}','{$rankinfo['r6']}','{$rankinfo['r7']}',
'{$rankinfo['r8']}','{$rankinfo['r9']}')";
    mysqli_query($conn,$sql10);
    $result=mysqli_affected_rows($conn);
    return $result;
}


//echo postcount_by_poster($conn,0);
//echo get_posts_by_id($conn,2)['usrname'];
//echo reply($conn,1,0,'admin','这是一个测试回复');
//echo get_replys_by_postid($conn,1)[0]['content'];
//echo get_usrinfo_by_group($conn,'jiangke');
?>
