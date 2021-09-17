<head>

</head>
<?php include 'funcs/connect.php';
 include 'funcs/funcs.php';
 if(isset($_GET['email']))
 {
$email=checkInput($_GET['email']);
$r=$db->prepare("select * from tblusers where email =:email");
$r->bindValue(':email',$email,PDO::PARAM_STR);
$r->execute();
//echo $r->rowCount();
$msg="<font color=red>ایمیل اشتباه است</font>";
while($row=$r->fetch())
	$msg="";
	
	echo $msg;
 }
 
 
 
 if(isset($_GET['s']))
 {
$email=checkInput($_GET['s']);
$r=$db->prepare("select * from tblusers where email like '%$email%'");
//$r->bindValue(':email',$email,PDO::PARAM_STR);
$r->execute();
//echo $r->rowCount();
echo '<div id="c1">';
while($row=$r->fetch())
	echo '<div onclick="setval(this.innerHTML)" class="v1" onmouseover="this.style.backgroundColor =\'whitesmoke\'" onmouseout="this.style.backgroundColor =\'white\'" >'.$row['email'].'</div>';
	
	echo '</div>';
	
	
 }

?>
