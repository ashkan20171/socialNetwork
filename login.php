<?php
session_start();
ob_start();
if(isset($_POST['user']) && isset($_POST['pass']))
{
include('funcs/connect.php');
include('funcs/funcs.php');
$user=checkInput( $_POST['user']);
$pass2=checkInput( $_POST['pass']);
$q="SELECT * FROM `tbladminuser` where email='$user' and pass='$pass2'";
$r=$db->query($q);

while($row=$r->fetch())
{
	$_SESSION['adminuser']=$row['email'];
	$_SESSION['fname']=$row['fname'];
	$_SESSION['lname']=$row['lname'];
	$_SESSION['adminlogin']=md5($_SERVER['REMOTE_ADDR']);
	//echo 'sdad';
	header("location:adminpanel/");

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

    <title>ورود به سایت</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">فرم ورود به پنل مدیریت</h2>
        <div class="login-wrap" style="text-align:center">
            <p>
              <input type="text" class="form-control" placeholder="ایمیل" autofocus name="user">
            </p>
            <p><span class="login-wrap" style="text-align:center">
              <input type="text" class="form-control" placeholder="رمز عبور" name="pass" >
            </span> </p>
            <button class="btn btn-lg btn-login btn-block" type="submit">ورود به سایت</button>
        </div>

      </form>

    </div>


  </body>
</html>
