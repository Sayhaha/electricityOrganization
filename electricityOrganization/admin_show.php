<?php
    require_once('class/admin.php');
    session_start();
    if(!isset($_SESSION['userId']) || $_SESSION['userId']==NULL) 
        echo "<script>alert('无权访问！');location.href='login.php';</script>";
    $adm = new Admin;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>数据列表</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">  
</head>
<body>
     <a href="admin_manager.php" style="font-size: 20px;float: right;">添加数据</a>
<div class="table-responsive">
    <table class="table">
        <caption><h3>电量列表</h3></caption>
        <thead>
            <tr>
                <th>宿舍楼</th>
                <th>宿舍号</th>
                <th>当前电量</th>
                <th>日期</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $adm->show();
            ?>
        </tbody>
</table>
</div>      

</body>
</html>