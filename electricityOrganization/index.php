<?php
	require_once('class/admin.php');
	$sel = new Admin;
	if(isset($_POST['dorBui']) && isset($_POST['roomNo']))
		$sel->date_query($_POST['dorBui'], $_POST['roomNo']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>查询页面</title>
	<style type="text/css">
		#form {
			width: 500px;
			margin: 120px auto;
			text-align: center;
			clear: both;
		}
		.input {
			width: 300px;
			height: 30px;
			font-size: 20px;
		}
	</style>
</head>
<body>
    <!-- <a href="login.php" style="float:right;font-size: 30px;margin-top: 0px;">管理员登陆</a> -->
<div id="form">
     <h1>用电查询</h1>
    <form action="index.php" method="post">
    	<select name="dorBui" class="input">
			<option value=-1 selected="selected">-----请选择-----</option>
			<option value="三舍A">三舍A</option>
			<option value="三舍B">三舍B</option>
			<option value="三舍C">三舍C</option>
		</select></br></br>
		<input type="text" class="input" name="roomNo" placeholder="请输入宿舍号"></br></br>
		<button type="submit" style="font-size: 20px;">查询</button>
    </form>
     </div>
</body>
</html>