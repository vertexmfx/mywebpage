<!DOCTYPE html>
<html lang="en">
<head>
  <meta content="text/html" charset="utf-8">
  <title>登录</title>
  <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
  <meta name="author" content="Vincent Garreau" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" media="screen" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <script src="dist/js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function login(){
            var usrid=document.getElementById('inputusrid').value;
            var passwd=document.getElementById('inputpasswd').value;
            var data={usrid:usrid,passwd:passwd};
            alert(data);
            $.ajax({
                type:"POST",
                dataType:"text",
                url:"functions/test2.php",
                data:{'usrid':usrid,'passwd':passwd},
                success:function (data) {
                    alert(data);
                    alert("登陆成功！");
                },
                error:function (result) {
                    alert("异常");
                }
            });}
        /*$(document).ready(function () {
            $('.login-button').click(function () {
                var usrid=document.getElementById('inputusrid');
                var passwd=document.getElementById('inputpasswd');
                var data={'usrid':usrid,'passwd':passwd};
                alert(data['usrid']);
                $.post('mysqlfunc.php',data,function(response){
                    if(response !=null){
                        window.location.href="index.php";
                    }else {
                        alert("用户名或密码错误");
                    }
                })
            })
        })}*/
    </script>
</head>
<body>
<div id="particles-js">
		<div class="login">
			<div class="login-top">
				登录
			</div>
            <form id="usrinfo" name="usrinfo" enctype="multipart/form-data">
			<div class="login-center clearfix">
				<div class="login-center-img"><img src="img/name.png"/></div>
				<div class="login-center-input">
					<input type="text" name="usrid" value="" id="inputusrid" placeholder="请输入您的账号" onfocus="this.placeholder=''" onblur="this.placeholder='请输入您的账号'"/>
					<div class="login-center-input-text">账号</div>
				</div>
			</div>
			<div class="login-center clearfix">
				<div class="login-center-img"><img src="img/password.png"/></div>
				<div class="login-center-input">
					<input type="password" name="passwd" value="" id="inputpasswd" placeholder="请输入您的密码" onfocus="this.placeholder=''" onblur="this.placeholder='请输入您的密码'"/>
					<div class="login-center-input-text">密码</div>
				</div>
			</div>
			<div class="login-center">
                <input type="button" name="submit" class="login-button" onclick="login()" value="登录">
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