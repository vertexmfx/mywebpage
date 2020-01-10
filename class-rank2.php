<?php
#setcookie("usrname","admin",time()+240);
include "mysqlfunc.php";
if(empty($_COOKIE['usrname'])){
    header("Location:login.php");
}
$namelist=select_ranks($conn,$_COOKIE['usrname']);
$namelistJiangke=$namelist[0];
$namelistChuti=$namelist[1];
$namelistWangye=$namelist[2];
if(!empty($_POST['ranksubmit'])){
    $post=$_POST;
    $i=0;
    $rankItem=array();
    $addrank=new AddRanks();
    $addrank->setRankername($_COOKIE['usrname']);
    foreach ($post as $key=>$value){
        if($key=='ranksubmit'){
            break;
        }
        $rankValue[]=$value;
        $i++;
        if($i==5){
            $i=0;
            $rankedname=substr($key,3,10);
            #echo $rankedname;
            #echo $rankValue[4];
            $addrank->addValue($rankedname,$rankValue);
            $rankValue=array();
        }
    }
    $result=$addrank->submit($conn);
    if ($result>0){
        echo "<script type='text/javascript'>alert('评价成功！')</script>";
        header("Location:showreviews/show-reveiw.php");
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/jquery.min.js"></script>
    <title>学员互评</title>
</head>
<body>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="text-align: center">
            <h4 style="text-align: left;font-weight: bold">你好，<?php echo $_COOKIE['usrname']?></h4>
            <h1 class="text-center" >
                <b>学员互评</b>
            </h1>
            <p style="padding-left:50px;text-align: left;font-weight: bold;font-size: large">请对讲课组、出题组、网页组的作业情况进行评分,
            其中，讲课组与出题组按每项ABCD四个等级评分，网页组按照总分16分评分。<br>可以给被评价的学员写下评语以鼓励或提出建议。<br>评价完成后请按下页面最下方的提交按钮。
            <br>注意：讲课组仅显示你未评价过的学员。</p>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8">

                <!--讲课组-->
                <div class="col-md-12">
                    <form role="form" name="formJiangke" id="formJiangke" action="class-rank2.php" method="post" style="align-items: center">
                        <table class="table-custom">
                            <style type="text/css">
                                table{ border-collapse:collapse; border:1px; table-layout: fixed}
                                table td{ width:50px; height:20px;border-bottom: 1px solid grey; padding:5px;}
                                table td input{text-align: center;border-radius: 3px;border:1px solid rgba(169, 169, 169, 0.26);}
                                h3{text-align: center;font-weight: bold;margin: 50px 50px 50px 50px}
                            </style>
                            <h3>讲课组</h3>
                            <tr>
                                <td>评分标准</td>
                                <td><label>课前准备、课件</label></td>
                                <td><label>气质、精神、声音</label></td>
                                <td><label>内容熟悉，思路清晰</label></td>
                                <td><label>概念和理论阐述清晰 </label></td>
                                <td><label>评语</label></td>
                            </tr>
                            <?php
                            foreach ($namelistJiangke as $item) {
                                print <<<JIANGKE
<tr>
                                <td style="margin-bottom: 20px">{$item['usrname']}</td>
                                <td><select class="select-rankpage" name="r1.{$item['usrname']}">
                                        <option   value="4" class="option">A</option>
                                        <option   value="3" class="option">B</option>
                                        <option   value="2" class="option">C</option>
                                        <option   value="1" class="option">D</option>
                                    </select></td>
                                <td><select class="select-rankpage" name="r2.{$item['usrname']}">
                                        <option   value="4" class="option">A</option>
                                        <option   value="3" class="option">B</option>
                                        <option   value="2" class="option">C</option>
                                        <option   value="1" class="option">D</option>
                                    </select></td>
                                <td><select class="select-rankpage" name="r3.{$item['usrname']}">
                                        <option   value="4" class="option">A</option>
                                        <option   value="3" class="option">B</option>
                                        <option   value="2" class="option">C</option>
                                        <option   value="1" class="option">D</option>
                                    </select></td>
                                <td><select class="select-rankpage" name="r4.{$item['usrname']}">
                                        <option   value="4" class="option">A</option>
                                        <option   value="3" class="option">B</option>
                                        <option   value="2" class="option">C</option>
                                        <option   value="1" class="option">D</option>
                                    </select></td>
                                    <td><input type="text" placeholder="你的评语" name="r5.{$item['usrname']}"></td>
                                    

                            </tr>
JIANGKE;

                            }
                            ?>

                        </table>

                </div>
                <!--出题组-->
                <div class="col-md-12">
                    <!--<form role="form" name="formChuti" id="formChuti" action="class-rank2.php" method="post">-->
                        <table class="table-custom">
                            <style type="text/css">
                                table{ border-collapse:collapse; border:1px; }
                                table td{ width:50px; height:20px;border-bottom: 1px solid grey; padding:5px;}
                            </style>
                            <h3>出题组<a href="class-resource.php?category=shiti" target="_blank"><p>查看试题</p></a></h3>
                            <tr>
                                <td>评分标准</td>
                                <td><label>卷面设计美观</label></td>
                                <td><label>难易程度适中</label></td>
                                <td><label>知识点覆盖全面</label></td>
                                <td><label>试卷严谨无差错</label></td>
                                <td>评语</td>
                            </tr>
                            <?php
                            foreach ($namelistChuti as $item) {
                                print <<<CHUTI
<tr>
                                <td style="margin-bottom: 20px">{$item['usrname']},试题{$item['description']}</td>
                                <td><select class="select-rankpage" name="r1.{$item['usrname']}">
                                        <option   value="4" class="option">A</option>
                                        <option   value="3" class="option">B</option>
                                        <option   value="2" class="option">C</option>
                                        <option   value="1" class="option">D</option>
                                    </select></td>
                                <td><select class="select-rankpage" name="r2.{$item['usrname']}">
                                        <option   value="4" class="option">A</option>
                                        <option   value="3" class="option">B</option>
                                        <option   value="2" class="option">C</option>
                                        <option   value="1" class="option">D</option>
                                    </select></td>
                                <td><select class="select-rankpage" name="r3.{$item['usrname']}">
                                        <option   value="4" class="option">A</option>
                                        <option   value="3" class="option">B</option>
                                        <option   value="2" class="option">C</option>
                                        <option   value="1" class="option">D</option>
                                    </select></td>
                                <td><select class="select-rankpage" name="r4.{$item['usrname']}">
                                        <option   value="4" class="option">A</option>
                                        <option   value="3" class="option">B</option>
                                        <option   value="2" class="option">C</option>
                                        <option   value="1" class="option">D</option>
                                    </select></td>
                                    <td><input type="text" placeholder="你的评语" name="r5.{$item['usrname']}"></td>

                            </tr>
CHUTI;

                            }
                            ?>

                        </table>
                        <!--出题组-->

                        <!--网页组-->
                    <!--</form>-->
                </div>
                <!--网页组-->
                <div class="col-md-12">
                    <!--<form role="form" name="formWangye" id="formWangye" action="class-rank2.php" method="post">-->
                        <table class="table-custom">
                            <style type="text/css">
                                table{ border-collapse:collapse; border:1px; table-layout: fixed}
                                table td{ width:25%; height:20px;border-bottom: 1px solid grey; padding:5px;}
                            </style>
                            <h3>网页组</h3>
                            <tr>
                                <td>姓名</td>
                                <td><label>任务分工</label></td>
                                <td><label>评分</label></td>
                                <td>评语</td>
                            </tr>
                            <?php
                            function optionNums(){
                                $htmlCode="";
                                for($k=16;$k>=1;$k--){
                                    $htmlCode=$htmlCode."<option   value=\"$k\" class=\"option\">$k</option>";
                                }
                                return $htmlCode;
                            }
                            $htmlCode=optionNums();
                            foreach ($namelistWangye as $item) {

                                print <<<WANGYE
<tr>
                                <td style="margin-bottom: 20px">{$item['usrname']}</td>
                                <td>任务分工：{$item['description']}</td>
                                <td><select class="select-rankpage" name="r1.{$item['usrname']}">
                                        {$htmlCode}
                                    </select></td>
                                    <input type="hidden" name="r2.{$item['usrname']}" value="0">
                                    <input type="hidden" name="r3.{$item['usrname']}" value="0">
                                    <input type="hidden" name="r4.{$item['usrname']}" value="0">
                                <td><input type="text" placeholder="你的评语" name="r5.{$item['usrname']}"></td>
                            </tr>
WANGYE;

                            }
                            ?>

                        </table>
                        <!--出题组-->

                        <!--网页组-->
                        <button type="submit" name="ranksubmit" class="btn btn-primary" value="提交" style="margin-left: 50%">
                            提交评分
                        </button>
                    </form>
                </div>
            </div>

        <div class="col-md-2"></div>
        </div>
    </div>
</div>
<div style="height: 100px"></div>

</body>
</html>
