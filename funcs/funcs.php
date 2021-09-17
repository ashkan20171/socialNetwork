<?php
function sendSms($url,$us,$ps,$from,$to,$text){ 
    $ch = curl_init(); 
    curl_setopt($ch,CURLOPT_URL,$url); 
    curl_setopt($ch,CURLOPT_POSTFIELDS,"username=$us&password=$ps&from=$from&to=$to&text=$text"); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
    $res = curl_exec($ch); 
    curl_close($ch); 
    return $res; 
} 

function delivery($url="http://www.postgah.net/API/GetDelivery.ashx",$id){ 
    $ch = curl_init(); 
    curl_setopt($ch,CURLOPT_URL,$url); 
    curl_setopt($ch,CURLOPT_POSTFIELDS,"recId=$id"); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
    $res = curl_exec($ch); 
    curl_close($ch); 
    return $res; 
} 

function getStatusOfSMS($s)
{
	switch($s)
	{
		case 0:
			return "ارسال شده به مخابرات";
			break;
		case 1:
			return "رسیده به گوشی";
			break;
		case 2:
			return "نرسیده به گوشی";
			break;
		case 8:
			return "رسیده به مخابرات";
			break;
		case 16:
			return "نرسیده به مخابرات";
			break;
		case 100:
			return "نامشخص";
			break;
	}
	
	
}

function getCredit($url,$us,$pw){ 
    $ch = curl_init(); 
    curl_setopt($ch,CURLOPT_URL,$url); 
    curl_setopt($ch,CURLOPT_POSTFIELDS,"username=$us&password=$pw"); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
    $res = curl_exec($ch); 
    curl_close($ch); 
    return $res; 
} 

function checkInput($s)
{

	$s=stripslashes($s);

	$s=escapeshellcmd($s);

	$s=htmlspecialchars($s);

	$s=addslashes($s);

	$s=htmlspecialchars($s); 

	$s=strip_tags($s);

	$s=str_replace("'","''",$s);

	$s = str_replace(array("\n", "'", "‘", "’", "'", "“", "”", "„", "?", '"'), array("", "\’", "\’", "\’", "\’", "\"", "\"", "\"", "\"", "\""), $s);

return $s;

}


function get_mojoodi($s)
{
	include 'connect.php';
	
	$r=$db->query("select sum(mablagh) from pardakhtiha where email like '$s'");	
	$row=$r->fetch();
	return $row[0];
	
	
}

function get_unreadpm($s)
{
	include 'connect.php';
	
	$r=$db->query("SELECT count(*) FROM `pm` WHERE `to` like '".$s."' and `isdelete`=0 and `isread`=0");	
	$row=$r->fetch();
	return $row[0];
	
	
}

function get_sentpm($s)
{
	include 'connect.php';
	
	$r=$db->query("SELECT count(*) FROM `pm` WHERE `from` like '".$s."'");	
	$row=$r->fetch();
	return $row[0];
	
	
}
//print_r (get_mojoodi('sadegh.info@gmail.com'));

?>