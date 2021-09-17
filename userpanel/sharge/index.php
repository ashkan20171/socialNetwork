<?php
include '../check2.php';

include '../../funcs/connect.php';

 $m=get_mojoodi($_SESSION['useremail']);
	if(intval($m<70000))
		{
			echo ('<script>alert("موجودی حساب شما کم است")</script>');
			echo('<script>window.location="sharge.php"</script>');	
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

  <body>

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
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            <p>لیست پرداختی های شما</p>
                            <form method="post" action="">
                            <input type="text" name="str" placeholder="عبارت مربوطه را وارد نمایید" autofocus>
                            <input type="submit" value="جستجو">
                            
                            </form>
                           
                          </header>
                          <table class="table table-striped border-top" id="sample_1">
                          <thead>
                          <tr>
                              <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                              <th>مبلغ</th>
                              <th class="hidden-phone">تاریخ پرداخت</th>
                              <th class="hidden-phone">شماره تراکنش</th>
                              <th class="hidden-phone">ای دی تراکنش</th>
                            </tr>
                          </thead>
                          <tbody>
                          <tr class="odd gradeX">
                              <?php
							  
							  $q="select * from pardakhtiha where email like'".$_SESSION['useremail']."'";
							  if(isset($_POST['str']))
							  $q="select * from pardakhtiha where email like'".$_SESSION['useremail']."' and (tarikh like '%".checkInput($_POST['str'])."%' or transid like '%".checkInput($_POST['str'])."%' or idget like '%".checkInput($_POST['str'])."%' or mablagh=".checkInput($_POST['str']).")";
								
							  $r=$db->query($q);
							  while($row=$r->fetch())
							  {
								  
								echo '<td><input type="checkbox" class="checkboxes" value="1" /></td>
                              <td>'.$row['mablagh'].'</td>
                              <td class="hidden-phone">'.$row['tarikh'].'</td>
                              <td class="hidden-phone">'.$row['transid'].'</td>
                              <td class="center hidden-phone">'.$row['idget'].'</td>
                            </tr>';  
								  
							  }
							  
							  
							  
							  ?>
                          </tbody>
                          </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>

   

<?php include '../js2.php'; ?>
  </body>
</html>
