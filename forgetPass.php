<?php
	if(isset($_POST['email']))
	{
	require('funcs/connect.php');
	require('funcs/phpmailer/class.phpmailer.php');
	require('funcs/funcs.php');
	$newpass=rand(1000,9999);
	//echo $newpass;
	$q=sprintf("update `tblusers` set pass='%s' where email='%s'",md5($newpass.'@#$%'),checkInput($_POST['email']));
	$db->query($q);
	
	
	
	
	
				
	$mail=new PHPMailer(true);
	
	$mail->IsSMTP(); 
	 

$mail->AddAddress($_POST['email']);


$mail->IsHTML(true);

$mail->Subject = "رمز عبور جدید شما در SocialNet";

$b='<table dir=rtl width="80%" border="0" align="center" style="border:#0CF thin dotted ">
    <tr style="background: none repeat scroll 0% 0% #41CAC0; color:white">
      <td><p align=center>
	   ارسال رمز جدید<br></p></td>
    </tr>
    <tr>
      <td align="center"><p alogn="right"><b>کاربر گرامی رمز عبور برای شما ارسال شده در اولین فرصت آن را تغییر دهید 
	  </b></p>
	  پسورد: '.$newpass.'
	  </td>
    </tr></table>';

$mail->Body    = $b;
$mail->Send();

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

    <title>قراموشی رمز عبور</title>

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
        <h2 class="form-signin-heading">لطفا آدرس ایمیل خود را وارد نمایید</h2>
        <div class="login-wrap" style="text-align:center">
            <input type="text" class="form-control" placeholder="لطفا ادرس ایمیل خود را وارد نمایید" autofocus name="email">
            <button class="btn btn-lg btn-login btn-block" type="submit">ارسال رمز جدید</button>
        </div>

      </form>

    </div>


  </body>
</html>
