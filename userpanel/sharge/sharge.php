<?php
include '../check2.php';


$test="";
$q=sprintf("select * from paylinesetting ");
				
				$r=$db->query($q);
				$row=$r->fetch();

if($row['test']==1)
{
$api="adxcv-zzadq-polkjsad-opp13opoz-1sdf455aadzmck1244567";
$test="-test";
}
else
$api=$row['api'];

				


if(isset($_POST['mablagh']))
{

$url= "http://payline.ir/payment$test/gateway-send"; 

$amount=intval($_POST['mablagh']);
$redirect=urlencode("http://www.daneshjooyar.com?m=".$_POST['mablagh']);
$r=send($url,$api,$amount,$redirect);
echo $r;
if($r>0)
{
	$_SESSION['tempmablagh']=$_POST['mablagh'];
	header("location:http://payline.ir/payment$test/gateway-$r");	
	
}

}

if(isset($_POST['trans_id'])&& isset($_POST['id_get']))
{
	$url= "http://payline.ir/payment$test/gateway-result-second"; 
$trans_id=$_POST['trans_id'];
$id_get=$_POST['id_get'];	
	$r=get($url,$api,$trans_id,$id_get);
	if($r==1)
	{
				$msg="<font color=green>پرداخت  انجام شد</font>";	
				$q=sprintf("INSERT INTO `pardakhtiha` ( `email` , `mablagh` , `tarikh` , `transid` , `idget` )VALUES 
				('%s', '%s', '%s', '%s', '%s');",checkInput($_SESSION['useremail']),checkInput($_SESSION['tempmablagh']),getCurrentDate(),checkInput($trans_id),checkInput($id_get));
				echo $q;
				$db->query($q);
	}
	else
	{
		
		$msg="<font color=red>پرداخت  انجام نشد</font>";	
	}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>صفحه اصلی پنل مدیریت</title>

    <?php include '../css2.php'; ?>
   
  </head>

  <body class="login-body">

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <?php include '../logo.php'; ?>
          <!--logo end-->
          <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
              
              <!-- settings end -->
              <!-- inbox dropdown start-->
              
              <!-- inbox dropdown end -->
             
          </ul>
          </div>
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  
                  <!-- user login dropdown start-->
                  <?php include '../userpart2.php'; ?>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <?php include '../sidebar2.php'; ?>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
      <section class="wrapper">
         <table border="" align="center">
         <tr><td><?php echo $msg; ?></td></tr>
         <tr style="background: none repeat scroll 0% 0% #41CAC0; ">
         <td>
         <br>
         مبلغ مورد نظر خود را وارد نمایید
         <br>
         </td>
         </tr>
         <tr>
         <td align="center">
         <form action="" method="post">
         <input type="text" name="mablagh" value="10000" placeholder="مبلغ" autofocus><br>
         <input type="submit" value="پرداخت" style="background-color:#0CC ;padding:10px; color:#FFF">
         </form>
         </td>
         </tr>
         
         </table>
         
      </section>
      <!--main content end-->
  </section>

   

<?php include '../js2.php'; ?>
  </body>
</html>
