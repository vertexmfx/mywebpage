<?php
include 'mysqlfunc.php';
if(isset($_POST['submit']) and !empty($_POST['submit'])) {
    global $usrname, $usrid;
    $usrid = $_POST['inputusrid'];
    $usrname = login($usrid, $_POST['inputpasswd'], $conn);
    if ($usrname != '') {
        setcookie("usrid", "$usrid", time() + 1800);
        setcookie("usrname","$usrname",time()+1800);
        header('Location:index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>登录</title>
  <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
  <meta name="author" content="Vincent Garreau" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" media="screen" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/reset.css"/>
</head>
<body>

<?php
if(isset($_POST['submit']) and !empty($_POST['submit']))
   { if($usrname==0){
        print <<<SC
<script>
alert('用户名或密码错误');
</script>
SC;
    }}

?>
<div id="particles-js">
		<div class="login">
			<div class="login-top">
				登录
			</div>
            <form action="login.php" method="post" name="usrinfo" enctype="multipart/form-data">
			<div class="login-center clearfix">
				<div class="login-center-img"><img src="img/name.png"/></div>
				<div class="login-center-input">
					<input type="text" name="inputusrid" value="" id="inputusrid" placeholder="请输入您的账号" onfocus="this.placeholder=''" onblur="this.placeholder='请输入您的账号'"/>
					<div class="login-center-input-text">账号</div>
				</div>
			</div>
			<div class="login-center clearfix">
				<div class="login-center-img"><img src="img/password.png"/></div>
				<div class="login-center-input">
					<input type="password" name="inputpasswd" value="" id="inputpasswd" placeholder="请输入您的密码" onfocus="this.placeholder=''" onblur="this.placeholder='请输入您的密码'"/>
					<div class="login-center-input-text">密码</div>
				</div>
			</div>
			<div class="login-center">
                <input type="submit" name="submit" class="login-button" value="登录">
			</div>
            </form>
		</div>
		<div class="sk-rotating-plane"></div>
</div>

<!-- scripts -->
<script src="js/particles.min.js"></script>
<script src="js/app.js"></script>
<script type="text/javascript">
	function hasClass(elem, cls) {
	  cls = cls || '';
	  if (cls.replace(/\s/g, '').length == 0) return false; //当cls没有参数时，返回false
	  return new RegExp(' ' + cls + ' ').test(' ' + elem.className + ' ');
	}
	 
	function addClass(ele, cls) {
	  if (!hasClass(ele, cls)) {
	    ele.className = ele.className == '' ? cls : ele.className + ' ' + cls;
	  }
	}
	 
	function removeClass(ele, cls) {
	  if (hasClass(ele, cls)) {
	    var newClass = ' ' + ele.className.replace(/[\t\r\n]/g, '') + ' ';
	    while (newClass.indexOf(' ' + cls + ' ') >= 0) {
	      newClass = newClass.replace(' ' + cls + ' ', ' ');
	    }
	    ele.className = newClass.replace(/^\s+|\s+$/g, '');
	  }
	}
</script>


</body>
</html>