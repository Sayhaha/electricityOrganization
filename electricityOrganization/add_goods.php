<?php
    require_once("./admin/goods.php");
    //添加商品
    session_start();
    if(!empty($_GET['goods_id']) && isset($_SESSION['user_id'])){
    	echo "<script language=javascript>alert('dfsf');</script>";
	    $id = $_GET['goods_id'];
		$order = new Goods();
		$order->add_goods($id,$_SESSION['user_id']);

    }else {
    	echo "<script language=javascript>alert('dfsf');location.href('car_purchase.php');</script>";
    }
?>