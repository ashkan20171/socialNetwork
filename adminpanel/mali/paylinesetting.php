<?php

include '../check2.php';


include '../../funcs/connect.php';


if(isset($_POST['api']))
{

if($_POST['test']==1)
$test=1;
else
$test=0;
				$q=sprintf("update paylinesetting set api='%s' , test='%s'",checkInput($_POST['api']),$test);
				
				$db->query($q);
	
	
}
$q=sprintf("select * from paylinesetting ");
				
				$r=$db->query($q);
				$row=$r->fetch();
$s="";
if($row['test']==1)
$s="checked";
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
         <table width="560" border="" align="center">
         
         <tr style="background: none repeat scroll 0% 0% #41CAC0; ">
         <td align="center">تنظیمات پیلاین</td>
         </tr>
         <tr>
         <td align="center">
         <form action="" method="post">
           <p>api:
  <input name="api" type="text" autofocus placeholder="your api" value="<?php echo $row['api']; ?>" size="70">
           </p>
           <p><input type="checkbox" value="1" <?php echo $s; ?> name="test"><br>
             <input type="submit" value="ثبت" style="background-color:#0CC ;padding:10px; color:#FFF">
           </p>
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
