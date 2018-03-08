<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'class/admin.php';
$adm = new Admin;
session_start();
if(!isset($_SESSION['userId']) || $_SESSION['userId']==NULL) echo "<script>alert('无权访问！');location.href='login.php'</script>";
if(empty($_GET['dorId'])||!isset($_GET['dorId'])) header("admin_show.php");
$adm->DeleInc($_GET['dorId']);
?>