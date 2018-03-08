<?php
	require_once('class/admin.php');
	$dorId = $_GET['dorId'];
	$sel = new Admin;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>用电信息</title>
	 <link rel="stylesheet" href="css/bootstrap.min.css"> 
</head>
<body>
<div style="margin-top: 50px">
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>宿舍楼</th>
				<th>宿舍号</th>
				<th>当前电量</th>
				<th>日期</th>
			</tr>
		</thead>
		<tbody>
			<?php
			     $sel->show_data($dorId);
			?>
		</tbody>
</table>
</div>  	
</div>
</body>
</html>