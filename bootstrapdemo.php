<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css" crossorigin="anonymous">
    <title>demo</title>
</head>
<body>
<?php
$filename='msg.txt';
if(file_exists($filename)){
    $string=file_get_contents($filename);
    if(strlen($string)>0){
        $msgs=unserialize($string);
    }else{
        $msgs=[];
    }
}else{
    fopen('msg.txt','w');
    $msgs=[];
}?>

<?php
    if(isset($_POST['submit'])){
    $usrname=$_POST['usrname'];
    $content=strip_tags($_POST['content']);
    $time=time();
    $data=compact('usrname','content','time');
    array_push($msgs,$data);
    $msgs=serialize($msgs);
    if(file_put_contents($filename,$msgs)){
        echo"<script>alert('留言成功');location.href='bootstrapdemo.php';</script>";
    }
}?>
<div class="card-header">
    <h1>留言板实例</h1>
</div>
<form action="#" method="post">
    <fieldset>
        <legend>legend</legend>
        <label>usrname</label><input type="text" name="usrname"/>
        <label>content</label><input type="text" name="content"/>
        <hr>
        <input type="submit" class="btn btn-primary" name="submit">
    </fieldset>
</form>
<?php
if(is_array($msgs)&&count($msgs)>0):?>
    <div class="list-group">
        <?php foreach($msgs as $val):?>
            <a href="#" class="list-group-item">
                <?php echo('username:'.$val['usrname'].' content:'.$val['content'].' time:'.date('Y-m-d h:i:s',$val['time']));?>
            </a>
        <?php endforeach;;?>
    </div>
<?php endif;?>


</body>
</html>