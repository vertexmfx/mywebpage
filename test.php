<?php
header("content-type:text/html;charset=utf-8");
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
$username='root';
$password='123456';

$conn=mysqli_connect($servername,$username,$password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "success";
$sql = "select * from doe.postinfo";
mysqli_query($conn,'SET NAMES UTF8');
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_all($result,1);
echo $data[0]['topic'];

phpinfo();

?>
