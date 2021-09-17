<?php

include '../check2.php';


include '../../funcs/connect.php';

//include '../../funcs/funcs.php';


if(isset($_POST['tell']))
{
	$res=sendSms("http://www.postgah.net/API/SendSms.ashx","golshan","2222","30002223332115",$_POST['tell'],$_POST['text']);
	if($res)
	{
		$q="INSERT INTO `sentsms` ( `email` , `from` , `to` , `text` , `tarikh` , `saat` , `status` )
VALUES (:email,:from,:to,:text,:tarikh,:saat,:status)";
		$r=$db->prepare($q);
		$r->bindValue(':email',$_SESSION['adminuser'],PDO::PARAM_STR);
		$r->bindValue(':from',"30002223332115",PDO::PARAM_STR);
		$r->bindValue(':to',$_POST['tell'],PDO::PARAM_STR);
		$r->bindValue(':text',$_POST['text'],PDO::PARAM_STR);
		$r->bindValue(':tarikh',getCurrentDate(),PDO::PARAM_STR);
		$r->bindValue(':saat',time(),PDO::PARAM_STR);
		$r->bindValue(':status',$res,PDO::PARAM_STR);	
		$r->execute();
		if($r->rowCount())
			$msg="ارسال شد";
	}
	else
	$msg="ارسال نشد";

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
                  <?php include '../userpart.php'; ?>
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
         <td align="center">فرم ارسال پیام</td>
         </tr>
         <tr>
         <td align="center">
         <form action="" method="post">
           <p>دریافت کنندگان  </p>
           <p>
             <input name="tell" type="text" autofocus id="tell" placeholder="موبایل" size="50">
             <br>
            </p>
           <p>متن پیام</p>
           <p>
             <textarea name="text" cols="50" rows="5" autofocus id="text" placeholder="موبایل"></textarea>
           </p>
           <p>
             <input type="submit" value="ارسال" style="background-color:#0CC ;padding:10px; color:#FFF">
           </p>
         </form>
         </td>
         </tr>
         
         </table></section>
      <!--main content end-->
  </section>

   

<?php include '../js2.php'; ?>
  </body>
</html>
