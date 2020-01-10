<?php
$varif=0;
if(!empty($_POST['yanzheng'])){
    $code=$_POST['code'];
    if($code=='kddoe'){
        $varif=1;

    }
    else{
        echo "<script> alert(\"验证码输入错误！\");</script>";
    }
}
if(!empty($_POST['submit'])){
    include "mysqlfunc.php";
    $ok=update_passwd($conn,$_POST['usrname'],$_POST['newpass']);
    if($ok==1){
        header("Location:index.php");
    }
    else{
        echo "<script> alert(\"操作失败\");</script>";
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <title>重置密码</title>
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <?php
            if($varif==1){
                print <<<NEWPASS
<form action="update-pass.php" method="post">
                <h2>你的用户名：</h2><input type="text" name="usrname">
                <h2>你的新密码：</h2><input type="password" name="newpass">
                <input type="submit" name="submit" value="确认修改">
            </form>
NEWPASS;

            }
            else{
                print <<<VARIF
<form action="update-pass.php" method="post">
                <h2>请输入验证码：</h2><input type="text" name="code">
                <input type="submit" name="yanzheng" value="确认">
            </form>
VARIF;

            }
            ?>

        </div>
    </div>
</div>


</body>
</html>
