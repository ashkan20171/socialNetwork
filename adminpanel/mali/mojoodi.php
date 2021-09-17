<?php
include '../check2.php';

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
                              <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th><th>ایمیل</th>
                              <th>مبلغ</th>
                               <th>تعداد تراکنش</th>
                            </tr>
                          </thead>
                          <tbody>
                          <tr class="odd gradeX">
                              <?php
							  
							  $q="select email,sum(mablagh) as mablagh , count(email) as tedad from pardakhtiha group by email";
							  if(isset($_POST['str']))
							  $q="select email,sum(mablagh) as mablagh , count(email) as tedad from pardakhtiha where email like'%".checkInput($_POST['str'])."%' group by email";
								
							  $r=$db->query($q);
							  while($row=$r->fetch())
							  {
								  
								echo '<td><input type="checkbox" class="checkboxes" value="1" /></td>
                              <td>'.$row['email'].'</td>
							  <td>'.$row['mablagh'].'</td>
                              <td>'.$row['tedad'].'</td>
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
