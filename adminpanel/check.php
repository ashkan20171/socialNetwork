<?php
session_start();
ob_start();
if($_SESSION['adminlogin']!=md5($_SERVER['REMOTE_ADDR']))
	header("location:../login.php");
include '../funcs/connect.php';
include '../funcs/funcs.php';


?>