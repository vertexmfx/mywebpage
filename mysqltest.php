<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <title>mysqltest</title>
</head>
<body>
<?php
$servername='localhost:3300';
$mysqlusername='root';
$mysqlpasswd='123456';
$dbname='doe';
$conn=new mysqli($servername,$mysqlusername,$mysqlpasswd,$dbname);
/*if($conn->connect_error){
    die('连接失败：'.$conn->connect_error);
}else{
    echo "连接成功";
}
$sql='select * from usrinfo';
$result=mysqli_query($conn,$sql);
$getdata=mysqli_fetch_all($result,MYSQLI_ASSOC)[0]['usrname'];
echo $getdata;
*/
//include "mysqlfunc.php";

#$posts=get_posts($conn);
#foreach ($posts as $key=>$value){
#    echo $value['description'];
#}
/*
if(isset($_POST['topic']) and !empty($_POST['topic'])){
    $topic=$_POST['topic'];
    $description=$_POST['description'];
    $tag=$_POST['tag'];
    $usrid=0;
    $usrname='admin';
    $sql1="insert into postinfo (usrname,usrid,topic,description,tag,foundtime)
values('$usrname',$usrid,'$topic','$description','$tag',now())";
    echo $sql1;
    $result=mysqli_query($conn,$sql1);
    if($result==1){
        echo '<script>alert("插入成功!");</script>';
    }else{
        echo '<script>alert("插入未成功");</script>';
    }
}else{
    echo '<script>alert("输入为空");</script>';
}
*/
/*
$dir=__DIR__."\class-resources\kejian";
$data=scandir($dir);
print_r($data);
print('<br>');
foreach ($data as $item){
    echo pathinfo($item, PATHINFO_BASENAME);
}
*/
$a="'s',2";
$arr=array($a);
echo $arr[0];
?>
<!--<form action="mysqltest.php" method="post">
    <input type="text" name="topic" class="text--primary" value="" placeholder="请输入主题">主题<br>
    <input type="text" name="description" class="text--primary" value="" placeholder="请输入内容">内容<br>
    <input type="text" name="tag" class="text--primary" value="" placeholder="你的标签">标签<br>
    <input type="submit" name="submit" value="发布" class="btn-primary">
</form>
-->


</body>
</html>
