<?php
    error_reporting(E_ALL ^ E_NOTICE);
    header("content-type:text/html; charset=utf8");
	require_once('class/admin.php');
	 session_start();
	 if(!isset($_SESSION['userId']) || $_SESSION['userId']==NULL) 
	 	 echo "<script>alert('无权访问！');location.href='login.php';</script>";
	$adm = new Admin;
	if(isset($_POST['dorBui']) && isset($_POST['roomNo']) && isset($_POST['eleRem']) && isset($_POST['date']))
		 $adm->add($_POST['dorBui'],$_POST['roomNo'],$_POST['eleRem'],$_POST['date']);
	$dorId = $_GET['dorId'];
	$result_arr = $adm->assignment($dorId);
    $dorBui = $result_arr['dorBui'];
    $roomNo = $result_arr['roomNo'];
    $eleRem = $result_arr['eleRem'];
    $date = $result_arr['Dat'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理</title>
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
<a href="admin_show.php" style="font-size: 20px;float: right;">电量列表</a>
    <div id="form">
    <h1>数据管理</h1></br>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<select name="dorBui" class="input">
			<option value=-1 selected="selected">-----请选择-----</option>
			<option value="三舍A">三舍A</option>
			<option value="三舍B">三舍B</option>
			<option value="三舍C">三舍C</option>
		</select></br></br>
		<input type="text" class="input" name="roomNo" placeholder="请输入宿舍号" value="<?php echo "$roomNo"; ?>"></br></br>
		<input type="text" class="input" name="eleRem" placeholder="当前电量" value="<?php echo "$eleRem"; ?>"></br></br>
		<input type="date" class="input" name="date" value="<?php echo "$date"; ?>"></br></br>
		<button type="submit" style="font-size: 20px">完成</button>
	</form>
	</div>
</body>
</html>