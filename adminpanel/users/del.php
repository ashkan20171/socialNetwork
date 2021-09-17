<?php
	require('../check2.php');
	if(isset($_GET['email']))
	{
	$email=$_GET['email'];;
	
	$q=sprintf("DELETE from `tblusers` WHERE `email` = '$email'");
	//echo $q;
	$r=$db->query($q);
		header("location:index.php");
			
	
	
	}

?>