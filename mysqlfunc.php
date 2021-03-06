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
    #$sql1 = "select * from doe.usrinfo where usrid=$usrid and passwd = md5('$passwd')";
    $sql1 = "select * from doe.usrinfo where usrname='$usrid' and passwd = md5('$passwd')";
    $loginresult = mysqli_query($conn, $sql1);
    $usrname = mysqli_fetch_assoc($loginresult)['usrid'];
    if($usrname!=null){
        setcookie("usrname",$_POST['usrid'],time()+1800);
        setcookie("usrid",$usrname,time()+1800);
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
    $sql2 = "select * from doe.postinfo order by postid desc";
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
r6,r7,r8,r9,r10)value({$rankinfo['rankerid']},'{$rankinfo['rankername']}',{$rankinfo['rankedid']},'{$rankinfo['rankedname']}','{$rankinfo['r1']}','{$rankinfo['r2']}',
'{$rankinfo['r3']}','{$rankinfo['r4']}','{$rankinfo['r5']}','{$rankinfo['r6']}','{$rankinfo['r7']}','{$rankinfo['r8']}','{$rankinfo['r9']}','{$rankinfo['r10']}')";
    mysqli_query($conn,$sql10);
    $result=mysqli_affected_rows($conn);
    return $result;
}
function get_rank_info($conn){
    $sql11="select avg(r1) as r1,avg(r2) as r2,avg(r3) as r3,avg(r4) as r4,count(*) as count,rankedname from ranks group by rankedid";
    $result=mysqli_query($conn,$sql11);
    $ranks=mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $ranks;
}

function select_ranks($conn,$usrname){
    $sqljiangke="select usrname from doe.usrinfo where groupname='jiangke'
and usrname not in(select distinct rankedname from doe.ranks where rankername='{$usrname}');";
    $result=mysqli_query($conn,$sqljiangke);
    $resultjiangke=mysqli_fetch_all($result,MYSQLI_ASSOC);
    $sqlchuti="select usrname,description from doe.usrinfo where groupname='chuti'
and usrname not in(select distinct rankedname from doe.ranks where rankername='{$usrname}') order by description;";
    $result=mysqli_query($conn,$sqlchuti);
    $resultchuti=mysqli_fetch_all($result,MYSQLI_ASSOC);
    $sqlwangye="select usrname,description from doe.usrinfo where groupname='wangye'
and usrname not in(select distinct rankedname from doe.ranks where rankername='{$usrname}') order by type,description;";
    $result=mysqli_query($conn,$sqlwangye);
    $resultwangye=mysqli_fetch_all($result,MYSQLI_ASSOC);
    return [$resultjiangke,$resultchuti,$resultwangye];
}

class AddRanks{
    public $sql="insert into doe.ranks(rankername,rankedname,r1,r2,r3,r4,r10)value";
    public $rankername=null;
    function setRankername($name){
        $this->rankername=$name;
    }
    function addValue($rankedname,$values){
        $newsql="('{$this->rankername}','{$rankedname}',{$values[0]},{$values[1]},{$values[2]},{$values[3]},'{$values[4]}'),";
        $this->sql=$this->sql.$newsql;
    }
    function submit($conn){
        $this->sql=rtrim($this->sql, ",");
        mysqli_query($conn,$this->sql);
        $result=mysqli_affected_rows($conn);
        return $result;
    }
}

function select_rand_reviews($conn,$name){
    $sql="select rankername,rankedname,r10 from doe.ranks where rankername !='{$name}' and r10 !='' order by rand() limit 9;";
    $result=mysqli_query($conn,$sql);
    $reviews=mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $reviews;

}

function update_passwd($conn,$usrname,$newpass){
    $sql="update doe.usrinfo set passwd=md5('{$newpass}') where usrname='{$usrname}';";
    $result=mysqli_query($conn,$sql);
    $ok=mysqli_affected_rows($conn);
    return $ok;
}

//echo postcount_by_poster($conn,0);
//echo get_posts_by_id($conn,2)['usrname'];
//echo reply($conn,1,0,'admin','这是一个测试回复');
//echo get_replys_by_postid($conn,1)[0]['content'];
//echo get_usrinfo_by_group($conn,'jiangke');
?>
