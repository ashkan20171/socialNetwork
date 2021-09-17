<head>
<meta http-equiv="refresh" content="15;URL=index.php" />
<meta charset="utf-8" />
</head>
<?php
	require('funcs/connect.php');
	if(isset($_GET['email']) && isset($_GET['validation']))
	{
	$email=$_GET['email'];;
	$validation=$_GET['validation'];
	$q=sprintf("UPDATE `tblusers` SET `disabled` = '0' WHERE `email` like '$email' and validationkey like '$validation'");
	//echo $q;
	$r=$db->query($q);
	if($r!=NULL)
		{
			echo "<font color=green>اکانت شما فعال شد شما به صورت خودکار به صفحه لاگین هدایت خواهید شد</font>";
			//header("location:index.php");
		}
		
	else
		echo "<font color=red>اشکال در فعال سازی اکانت</font>";
	
	}

?>