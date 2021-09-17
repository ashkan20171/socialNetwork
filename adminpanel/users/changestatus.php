<?php
	require('../check2.php');
	if(isset($_GET['email']) && isset($_GET['flag']))
	{
	$email=$_GET['email'];;
	$flag=$_GET['flag'];
	$q=sprintf("UPDATE `tblusers` SET `disabled` = '$flag' WHERE `email` like '$email'");
	//echo $q;
	$r=$db->query($q);
		header("location:index.php");
			
	
	
	}

?>