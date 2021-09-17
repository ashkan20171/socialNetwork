<?php
session_start();
ob_start();

if($_SESSION['userlogin']!=1)
	header("location:../index.php");

include '../funcs/connect.php';
include '../funcs/funcs.php';
include '../funcs/date.php';
include '../funcs/payfunc.php';


?>