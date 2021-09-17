<?php
include 'check.php';
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

    <?php include 'css.php'; ?>
   
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <?php include 'logo.php'; ?>
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
                  <?php include 'userpart.php'; ?>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <?php include 'sidebar.php'; ?>
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
                              Dynamic Table
                          </header>
                          <table class="table table-striped border-top" id="sample_1">
                          <thead>
                          <tr>
                              <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                              <th>Username</th>
                              <th class="hidden-phone">Email</th>
                              <th class="hidden-phone">Points</th>
                              <th class="hidden-phone">Joined</th>
                              <th class="hidden-phone"></th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr class="odd gradeX">
                              <td><input type="checkbox" class="checkboxes" value="1" /></td>
                              <td>Jhone doe</td>
                              <td class="hidden-phone"><a href="mailto:jhone-doe@gmail.com">jhone-doe@gmail.com</a></td>
                              <td class="hidden-phone">10</td>
                              <td class="center hidden-phone">02.03.2013</td>
                              <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                          </tr>
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

   

<?php include 'js.php'; ?>
  </body>
</html>
