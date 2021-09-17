<?php
include '../check2.php';


$test="";
$q=sprintf("select * from paylinesetting ");
				
				$r=$db->query($q);
				$row=$r->fetch();


				


if(isset($_POST['tell']))
{

$temp=rand(1000,9999);
				
				include '../../funcs/connect.php';
		
$q="UPDATE `tbluserinfo` SET `tell` = :tell,`tempcode` = :temp WHERE CONVERT( `tbluserinfo`.`email` USING utf8 ) = :email";
				//echo $q;
				
				$r=$db->prepare($q);
				$r->bindValue(':tell',$_POST['tell'],PDO::PARAM_STR);
				$r->bindValue(':temp',$temp,PDO::PARAM_STR);
				$r->bindValue(':email',$_SESSION['useremail'],PDO::PARAM_STR);
				$r->execute();
				if($r->rowCount()>0)
				{
						$msg="<font color=green>ثبت تلفن انجام شد</font>";
						$res=sendSms("http://www.postgah.net/API/SendSms.ashx","golshan","2225","30002223332115",$_POST['tell'],$temp);
						header("location:activetell.php");
				
				}
						
	
	else
	{
		
		$msg="<font color=red>ثبت تلفن انجام نشد</font>";	
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
         <td>شماره همراه خود را وارد نمایید</td>
         </tr>
         <tr>
         <td align="center">
         <form action="" method="post">
         <input name="tell" type="text" autofocus id="tell" placeholder="موبایل" size="50"><br>
         <input type="submit" value="ثبت" style="background-color:#0CC ;padding:10px; color:#FFF">
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
