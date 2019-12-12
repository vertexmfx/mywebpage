<?php
header("content-type:text/html;charset=utf-8");
include 'mysqlfunc.php';
echo 'you are in.';
if(!empty($_POST['submit'])) {
    global $usrname, $usrid;
    $usrid = $_POST['inputusrid'];
    $usrname = login($usrid, $_POST['inputpasswd'], $conn);
    echo $usrname;
    if ($usrname !="") {
        setcookie("usrid", "$usrid", time() + 1800);
        setcookie("usrname","$usrname",time()+1800);
        header('Location:index.php');
    }
}
?>