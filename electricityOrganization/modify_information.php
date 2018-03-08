<?php
	require_once('class/admin.php');
	session_start();
    if(!isset($_SESSION['userId']) || $_SESSION['userId']==NULL)
        echo "<script>alert('无权访问！');location.href='login.php';</script>";
    if(!isset($_GET['dorId'])||$_GET['dorId'] == "") header("Location:admin_show.php");
    $adm = new Admin;
    $dorId = $_GET['dorId'];
    $result_arr = $adm->assignment($dorId);
    $dorBui = $result_arr['dorBui'];
    $roomNo = $result_arr['roomNo'];
    $eleRem = $result_arr['eleRem'];
    $date = $result_arr['Dat'];
    if(isset($_POST['dorBui']) && isset($_POST['roomNo']) && isset($_POST['eleRem']) && isset($_POST['date']))
		$adm->modify($dorId,$_POST['dorBui'],$_POST['roomNo'],$_POST['eleRem'],$_POST['date']);
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
	<form action="modify_information.php?dorId=<?php echo "$dorId";?>" method="post">
		<input type="text" class="input" name="dorBui" placeholder="请输入宿舍楼" value="<?php echo "$dorBui"; ?>"></br></br>
		<input type="text" class="input" name="roomNo" placeholder="请输入宿舍号" value="<?php echo "$roomNo"; ?>"></br></br>
		<input type="text" class="input" name="eleRem" placeholder="当前电费" value="<?php echo "$eleRem"; ?>"></br></br>
		<input type="date" class="input" name="date" value="<?php echo "$date"; ?>"></br></br>
		<button type="submit" style="font-size: 20px">完成</button>
	</form>
	</div>
</body>
</html>