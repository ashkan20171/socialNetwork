<?php
include 'funcs/funcs.php';

$r=getCredit("http://www.postgah.net/API/GetCredit.ashx","golshan","2225");
echo $r;
	
if(isset($_POST['from'])&& isset($_POST['to']))
{
	echo 'test';
		
	$res=sendSms("http://www.postgah.net/API/SendSms.ashx","golshan","2225",$_POST['from'],$_POST['to'],$_POST['text']);
	
	echo $res;
	echo '<br>';
	$r=delivery("http://www.postgah.net/API/GetDelivery.ashx",$res);
echo $r;
	switch($r)
	{
		case 0:
			echo 'mokhaberat';	
			break;
		case 1: 
		echo 'send';
		break;
		
		
		
	}
	
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>


<body>
<form action="" method="post">
from:<input type="text" name="from" value="30002223332115" />
to:<input type="text" name="to" value="" />
matn:<input type="text" name="text" value="" />

<input type="submit" value="send SMS" />



</form>
</body>
</html>