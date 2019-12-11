<?php
function loginfo(){
$remoteip=$_SERVER['REMOTE_ADDR'];
$time=date("Y-m-d H:i:s");
if(!empty($_COOKIE['usrid'])){
$usrid=$_COOKIE['usrid'];
$usrname=$_COOKIE['usrname'];
}else{
$usrid='null';
$usrname='null';
}
$loadinfo= "$remoteip,$time,$usrid,$usrname;\n";
$fin=fopen('loginfo.txt','a');
fwrite($fin,$loadinfo);
fclose($fin);
}

if(PHP_OS=='WINNT'){
    $servername='localhost:3300';
}else{
    $servername='localhost';
}
$mysqlusername = 'root';
$mysqlpasswd = '123456';
$dbname = 'doe';
global $conn;
$conn = new mysqli($servername, $mysqlusername, $mysqlpasswd, $dbname);
mysqli_query($conn,'SET NAMES UTF8');
function login($usrid, $passwd, $conn)
{
    $usrname = 0;
    $sql1 = "select * from doe.usrinfo where usrid=$usrid and passwd = md5('$passwd')";
    $loginresult = mysqli_query($conn, $sql1);
    $usrname = mysqli_fetch_assoc($loginresult)['usrname'];
    return $usrname;
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


//echo postcount_by_poster($conn,0);
//echo get_posts_by_id($conn,2)['usrname'];
//echo reply($conn,1,0,'admin','这是一个测试回复');
//echo get_replys_by_postid($conn,1)[0]['content'];
//echo get_usrinfo_by_group($conn,'jiangke');
?>
