<?php
ob_start();
session_start();
require('funcs/funcs.php');
require_once 'funcs/connect.php';
require('funcs/date.php');


if(isset($_POST['email1']))
{
	try
	{
		$q=sprintf("select * from `tblusers` where `email`='%s' and `pass`='%s'",checkInput( $_POST['email1']),md5($_POST['pass1']."@#$%"));
		//echo $q;
		$r=$db->query($q);
		
		
		
		while($row=$r->fetch())
		{
			if($row["disabled"]==0)
			{
				if($_POST['remember']==1)
				{
					setcookie("email",$_POST['email1'],time()+30);
					setcookie("pass",$_POST['pass1'],time()+30);
					
				}
				
				
			require_once 'funcs/phpmailer/class.phpmailer.php';	
			$mail=new PHPMailer(true);
			
			$mail->IsSMTP(); 
			 
		
		$mail->AddAddress($_POST['email1']);
		
		
		$mail->IsHTML(true);
		
		$mail->Subject = "ورود به سایت SocialNet";
		
		$b='<table dir=rtl width="80%" border="0" align="center" style="border:#0CF thin dotted ">
			<tr style="background: none repeat scroll 0% 0% #41CAC0; color:white">
			  <td><p align=center>
			   کاربر گرامی<br></p></td>
			</tr>
			<tr>
			  <td align="center"><p alogn="right"><b>
		با آدرس ای پی'.$_SERVER['REMOTE_ADDR'].' و در تاریخ '.getCurrentDate().'  به سایت وارد شدید.
		این ایمیل صرفا جهت یادآوری و حفظ امنیت بیشتر به صورت اتوماتیک برای شما ارسال شده است.
		از جواب دادن به این ایمیل خود داری فرمایید  
			  </b></p></td>
			</tr></table>';
		
		$mail->Body    = $b;
	//	$mail->Send();

				
				
				$_SESSION['userlogin']=1;
				
				$_SESSION['fname']=$row["fname"];
				$_SESSION['lname']=$row["lname"];
				$_SESSION['useremail']=$_POST['email1'];
				header("location:userpanel/");
				
				
			}
			else
				$msg2= '<font color=red><b>اکانت شما تایید نشده است<b></font>';
			
		}
	}
	catch(PDOException $ex)
	{
		echo  $ex->getMessage();
	}
	
}

if(isset($_POST['email']) && $_POST['email']==$_POST['re_email'])
{
if(strcmp(strtoupper( $_POST['captcha']),$_SESSION['captcha'])==0)
{

	try
	{
		
		
		//hash('md5',$_POST['pass']);
	
	$q=sprintf("INSERT INTO `tblusers` ( `fname` , `lname` , `email` , `pass` , `signupdate` , `disabled` , `typeofuser` , `validationkey` )VALUES ('%s', '%s', '%s', '%s', '%s', '1', '0', '%s');",checkInput($_POST['fname']),checkInput($_POST['lname']),checkInput($_POST['email']),md5($_POST['pass'].'@#$%'),getCurrentDate(),md5($_POST['pass'].'@#$%'));
	//echo ($_POST['pass'].'@#$%');
	$r=$db->query($q);
	
	$q=sprintf("INSERT INTO `tbluserinfo` ( `email` , `tell` , `ostan` , `shahr` , `address` , `sen` , `gensiyat` , `pic` , `taahol` )VALUES ('%s', '', '', '', '', '', '', '', '');",checkInput($_POST['email']));
	$db->query($q);
	//$n=$r->rowCount();
	
	//if($n>0)
	if( $r!=NULL)
	{
		$msg="<font color=green>ثبت نام با موفقیت انجام شد<br> ایمیلی برای شما ارسال شده ان را تایید کنید </font>";
		
		require_once 'funcs/phpmailer/class.phpmailer.php';	
		$mail=new PHPMailer(true);
		
		$mail->IsSMTP(); 
		 
	
	$mail->AddAddress($_POST['email']);
	
	
	$mail->IsHTML(true);
	
	$mail->Subject = "تایید ثبت نام در سایت SocialNet";
	
	$b='<table dir=rtl width="80%" border="0" align="center" style="border:#0CF thin dotted ">
		<tr style="background: none repeat scroll 0% 0% #41CAC0; color:white">
		  <td><p align=center>دوست عزیز: '.$_POST['fname']." ".$_POST['lname'].'</p>
		  <p>&nbsp;</p></td>
		</tr>
		<tr>
		  <td align="center"><p style=""><b>جهت فعال سازی عضویت بر روی لینک زیر کلیک نمایید</b><br></p>
		  <p><a href=localhost/socaialNetwork/active.php?email='.$_POST['email'].'&validation='.md5($_POST['pass'].'@#$%').'>بر روی این لینک کلیک کنید</a></p></td>
		</tr></table>';
	
	$mail->Body    = $b;
	$mail->Send();
	
	
	}
	else
		$msg="<font color=red>ثبت نام با موفقیت انجام نشد</font>";
	}
	
	catch(Exception $ex)
	{
		$msg="<font color=red>ثبت نام با موفقیت انجام نشد</font>";
		
	}
}
else
	$msg="<font color=red>تصویر امنیتی را درست وارد کنید</font>";

}
?>
<!DOCTYPE html>
<html lang="en" id="facebook" class="no_js">
<head>
<meta charset="utf-8" />
<noscript><meta http-equiv="refresh" content="0; URL=/?_fb_noscript=1" /></noscript>
<meta name="referrer" content="default" id="meta_referrer" />
<title id="pageTitle">صفحه اصلی</title>
<meta property="og:site_name" content="Facebook" /><meta property="og:url" content="" />
<meta property="og:image" content="" />
<meta property="og:locale" content="en_US" />
<link rel="canonical" href="" />
<link rel="alternate" media="only screen and (max-width: 640px)" href="" />
<link rel="alternate" media="handheld" href="" />
<meta name="description" content="Facebook is a social utility that connects people with friends and others who work, study and live around them. People use Facebook to keep up with..." />
<meta name="robots" content="noodp,noydir" />
<noscript><meta http-equiv="X-Frame-Options" content="DENY" />
</noscript><link rel="shortcut icon" href="" />
    <link type="text/css" rel="stylesheet" href="css/1.css" />
    <link type="text/css" rel="stylesheet" href="css/2.css" />
    <link type="text/css" rel="stylesheet" href="css/3.css" />
    <link type="text/css" rel="stylesheet" href="css/4.css" />

</head><body class="fbIndex UIPage_LoggedOut hasSmurfbar hasSmurfbarLoggedOut hasPrivacyLite gecko win Locale_en_US" dir="ltr"><div class="_li"><div id="pagelet_bluebar" data-referrer="pagelet_bluebar"><div id="blueBarHolder"><div id="blueBar" class="aboveSidebar"><div><div class="loggedout_menubar_container"><div class="clearfix loggedout_menubar"><a class="lfloat _ohe" href="/" title="Go to Facebook Home"><i class="fb_logo img sp_6y74ue sx_1668ad"><u>Facebook logo</u></i></a><div class="menu_login_container rfloat _ohf"><form id="login_form" action="" method="post" >
<table cellspacing="0"><tr><td class="html7magic"><label for="email">ایمیل</label></td><td class="html7magic"><label for="pass">رمز عبور</label></td></tr><tr>
<td>

<?php
echo $msg2='';
?></td><td><input type="text" class="inputtext" name="email1" id="email1" value="<?php echo $_COOKIE['email']; ?>" tabindex="1" />  <input type="password" class="inputtext" name="pass1" id="pass1" tabindex="2" value="<?php echo $_COOKIE['pass']; ?>" /></td><td><label class="uiButton uiButtonConfirm" id="loginbutton" for="u_0_n">
<input value="ورود" tabindex="4" type="submit" id="u_0_n" name="login" /></label></td></tr><tr><td class="login_form_label_field"><div><div class="uiInputLabel clearfix uiInputLabelLegacy">
<input id="persist_box" type="checkbox" name="remember" value="1" tabindex="3" class="uiInputLabelInput uiInputLabelCheckbox" /><label for="persist_box" class="uiInputLabelLabel">مرا به خاطر بسپار</label></div></div></td><td class="login_form_label_field"><a rel="nofollow" href="forgetPass.php">فراموش کردن رمز عبور</a></td></tr></table>
</form></div></div></div></div></div></div></div><div id="globalContainer" class="uiContextualLayerParent"><div id="content" class="fb_content clearfix"><div><div class="_50dz"><div style="background: #edf0f5"><div class="pvl" style="width: 980px; margin: 0 auto"><div class="_7d _6_ _76">
                <h1 class="inlineBlock _3ma _6n _6s _6v" style="padding: 42px 0 24px; font-size: 28px; line-height: 36px"> با دوستان خود از طریق سایت در ارتباط باشید</h1><div class="mtl pbm"><div class="_6a _6b mrl" style="text-align: center; width: 55px"><img class="img" src="https://fbcdn-dragon-a.akamaihd.net/hphotos-ak-xap1/t39.2365-6/851565_602269956474188_918638970_n.png" alt="" style="vertical-align: middle" /></div><div class="_6a _6b product_desc"></div>
                تصاویر خود را به اشتراک بگذارید
                </div><div class="mtl pbm"><div class="_6a _6b mrl" style="text-align: center; width: 55px"><img class="img" src="https://fbcdn-dragon-a.akamaihd.net/hphotos-ak-xap1/t39.2365-6/851585_216271631855613_2121533625_n.png" alt="" style="vertical-align: middle" /></div>
                <div class="_6a _6b product_desc">به اشتراک بگذارید هر انچه را دوست دارید</div></div><div class="mtl pbm"><div class="_6a _6b mrl" style="text-align: center; width: 55px"><img class="img" src="https://fbcdn-dragon-a.akamaihd.net/hphotos-ak-xap1/t39.2365-6/851558_160351450817973_1678868765_n.png" alt="" style="vertical-align: middle" /></div>
                <div class="_6a _6b product_desc">دوستان خود را از طریق سایت پیدا کنید</div></div></div><div class="_6_ _74">
                <h1 class="mbs _3ma _6n _6s _6v" style="font-size: 36px">عضویت در سایت</h1><h2 class="mbl _3m9 _6o _6s _mf">
                  <noscript>
                  </noscript>
                
                </h2>
                <div align="center" id=""><?php echo $msg=""; ?></div>
                <div><div><div class="_58mf"><div id="reg_box" class="registration_redesign">
                <form method="post" id="reg" name="reg" action="" onSubmit="return check(email.value,re_email.value)" >
                <div id="reg_form_box" class="large_form"><div class="clearfix _58mh"><div class="mrm lfloat _ohe"><div class="_5dbb" id="u_0_0">
                <input type="text" class="inputtext _58mg _5dba DOMControl_placeholder" data-type="text" name="fname" aria-required="1" placeholder="نام" id="u_0_1" aria-label="First Name" /><i class="_5dbc img sp_6y74ue sx_9088fa"></i><i class="_5dbd img sp_6y74ue sx_625dcb"></i></div></div><div class="mbm rfloat _ohf"><div class="_5dbb" id="u_0_2">
                <input type="text" class="inputtext _58mg _5dba DOMControl_placeholder" data-type="text" name="lname" aria-required="1" placeholder="نام خانوادگی" id="u_0_3" aria-label="Last Name" /><i class="_5dbc img sp_6y74ue sx_9088fa"></i><i class="_5dbd img sp_6y74ue sx_625dcb"></i></div></div></div><div class="mbm"><div class="_5dbb" id="u_0_4">
                <input type="text" class="inputtext _58mg _5dba DOMControl_placeholder" data-type="text" id="email11" name="email" aria-required="1" placeholder="ایمیل"  aria-label="Your Email"  /><i class="_5dbc img sp_6y74ue sx_9088fa"></i><i class="_5dbd img sp_6y74ue sx_625dcb"></i><div id="id1"></div></div></div><div class="mbm" id="u_0_6"><div class="_5dbb" id="u_0_7">
                <input type="text" class="inputtext _58mg _5dba DOMControl_placeholder" data-type="text" name="re_email" aria-required="1" placeholder="تکرار ایمیل" id="u_0_8" aria-label="Re-enter Email2" /><i class="_5dbc img sp_6y74ue sx_9088fa"></i><i class="_5dbd img sp_6y74ue sx_625dcb"></i></div></div><div class="mbm"><div class="_5dbb" id="u_0_9">
                
                <input type="password" class="inputtext _58mg _5dba DOMControl_placeholder" data-type="text" name="pass" aria-required="1" placeholder="رمز عبور" id="u_0_a" aria-label="New Password" /><i class="_5dbc img sp_6y74ue sx_9088fa"></i><i class="_5dbd img sp_6y74ue sx_625dcb"></i></div></div>
                
                
                <div class="mbm"><div class="_5dbb" id="u_0_9">
                
                <input type="text" class="inputtext _58mg _5dba DOMControl_placeholder" data-type="text" name="captcha" aria-required="1" placeholder="عبارت داخل تصویر را وارد کنید" id="u_0_a" aria-label="New Password" /><i class="_5dbc img sp_6y74ue sx_9088fa"></i><i class="_5dbd img sp_6y74ue sx_625dcb"></i><img src="funcs/captcha.php" width="100px"></div></div>
                
                
                
                
                <div class="_58mq _5dbb" id="u_0_b"></div><div class="clearfix">
                <button type="submit" class="_6j mvm _6wk _6wl _58mi _3ma _6o _6v" name="websubmit" id="u_0_i">Sign Up</button><span class="hidden_elem _58ml" id="u_0_l"><img class="img" src="https://fbstatic-a.akamaihd.net/rsrc.php/v2/yb/r/GsNJNwuI-UM.gif" alt="" width="16" height="11" /></span></div></div></form><div id="reg_error" class="_58mn hidden_elem"><div id="reg_error_inner" class="_58mo">An error occurred. Please try again.</div></div><div id="reg_pages_msg" class="_58mk"></div></div></div></div></div></div></div></div></div></div></div><div id="pageFooter" data-referrer="page_footer"><div id="contentCurve"></div><div class="mvl copyright">
                  <div class="fsm fwn fcg">socialNet<span> © 2020</span> · <a rel="dialog"  href="#" role="button">English (US)</a></div></div></div></div></div>
<!-- BigPipe construction and first response -->
<script language="javascript" type="text/javascript" src="js/jquery.js"></script>                                                                                                                                                                                                                                                                                <script language="javascript">
																																																																				
																																																																				
function check(email,reemail)	{
	//alert(email);
	if(email==reemail)
	return true;
	else
	{
		alert('ایمیل ها مشابه نیستند');
return false;	
	}
	
}

$(document).ready(function() {
    
	$("#email11").blur(function(){
		var x=$(this).val();
		alert('dsfs');
		$.post("checkmail.php",{email:x},function(data){
			$("#id1").html(data);
			});
		});
	
	});
</script>
<script language="javascript" type="text/javascript" src="js/ajax2.js"></script>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  </body></html>
