<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once ('class/login.class.php');
    $User = new User;
    if(isset($_POST['userName'])&&isset($_POST['userPsw'])){
	   $User->Login(trim($_POST['userName']),trim($_POST['userPsw']));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登陆</title>
</head>
<body>
	<form action="login.php" method="post">
		<div style="margin-top: 200px;text-align:center;">
			<input style="width: 300px;height: 50px;font-size: 25px" type="text" name="userName" placeholder="用户名"><br/>
		</div>
		<div style="margin-top: 20px;text-align:center;">
			<input style="width: 300px;height: 50px;font-size: 25px" type="password" name="userPsw" placeholder="密码">
		</div>
		<div style="margin-top: 10px;text-align:center;">
			<button type="submit" style="margin-top: 10px;text-align:center;font-size: 25px;">登录</button>
		</div>
	</form>
				
</body>
</html>