<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>ارسال ایمیل</title>

<style type="text/css">
input[type="text"],
input[type="file"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="datetime-local"],
input[type="month"],
input[type="week"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea {
    -webkit-appearance: none;
    -webkit-border-radius: 0;
    border-radius: 0;
    background-color: white;
    font-family: inherit;
    border: 1px solid #cccccc;
    -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    color: rgba(0, 0, 0, 0.75);
    display: block;
    font-size: 0.875em;
    margin: 0 0 0.2em 0;
    padding: 0.5em;
    height: 2.3125em;
    width: 100%;
	height:30px;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-transition: -webkit-box-shadow 0.45s, border-color 0.45s ease-in-out;
    -moz-transition: -moz-box-shadow 0.45s, border-color 0.45s ease-in-out;
    transition: box-shadow 0.45s, border-color 0.45s ease-in-out;
}
input[type="text"]:focus,
input[type="password"]:focus,
input[type="date"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="month"]:focus,
input[type="week"]:focus,
input[type="email"]:focus,
input[type="number"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="time"]:focus,
input[type="url"]:focus,
textarea:focus {
    -webkit-box-shadow: 0 0 5px #999999;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border-color: #999999;
}

input[type="text"]:focus,
input[type="password"]:focus,
input[type="date"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="month"]:focus,
input[type="week"]:focus,
input[type="email"]:focus,
input[type="number"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="time"]:focus,
input[type="url"]:focus,
textarea:focus {
    background: #fafafa;
    border-color: #999999;
    outline: none;
}

input[type="text"][disabled],
input[type="password"][disabled],
input[type="date"][disabled],
input[type="datetime"][disabled],
input[type="datetime-local"][disabled],
input[type="month"][disabled],
input[type="week"][disabled],
input[type="email"][disabled],
input[type="number"][disabled],
input[type="search"][disabled],
input[type="tel"][disabled],
input[type="time"][disabled],
input[type="url"][disabled],
textarea[disabled] {
    background-color: #dddddd;
}
.Button-success{
box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5) inset;
border-style: solid;
border-width: 1px;
cursor: pointer;
font-family: inherit;
line-height: normal;
margin: 0px 0px 0.4em;
position: relative;
text-decoration: none;
text-align: center;
display: inline-block;
padding: 0.75em 1.5em 0.8125em;
font-size: 1em;
background-color: #2BA6CB;
border-color: #2284A1;
color: #FFF;	
}
#MailForm{
	direction:rtl;
	width:500px;
	height:500px;
	border:5px solid #39F;
	margin:50px auto;
}
#MailForm2{
	width:400px;
	text-align:center;
	margin:20px auto;
}
#MailForm h2{
	text-align:center;
	font-family:BNazanin;
}
#messagetext{
	height:250px;
}
</style>


</head>

<body>
 <div id="MailForm">
 <h2>ارسال ایمیل</h2>
 <div id="MailForm2">
 <form action="" method="post" name="phpmailer" id="phpmailer">
 
 	<input type="email" name="email" id="email" placeholder="ایمیل مقصد را وارد کنید" />
    <br/>
    <input type="text" name="subject" id="subject" placeholder="موضوع ایمیل خود را وارد کنید"/>
    <br/>
    <textarea name="messagetext" id="messagetext"></textarea>
    <br/>
    
   
    <input type="button" onClick="CheckSend();"   value="ارسال " class="Button-success"/>
    
 </form>
 <script type="text/javascript">
 function CheckSend()
 {
	 var email = document.getElementById("email").value;
	 var subject = document.getElementById("subject").value;
	 var messagetext = document.getElementById("messagetext").value;
	 if(email=='')
	 {
		 alert('لطفا ایمیل را وارد کنید');
	 }
	 else if(subject=='')
	 {
		 alert('موضوع را بنویسید');
	 }
	 else if(messagetext=='')
	 {
		 alert('متن ایمیل خود را بنویسید');
	 }
	 else
	 {
		 document.getElementById("phpmailer").submit();
	 }
 }
 
 </script>
 
 
 </div>
 </div>
 <?php
 if(isset($_POST['email']))
 {
	 require_once ("PHPMailer5.2.1/class.phpmailer.php");
	 $mail = new PHPMailer(true);
	 $mail->IsSMTP();
	 	 try {
					$mail->Host       = "smtp.gmail.com"; // آدرس SMTP سایت گوگل        
					$mail->SMTPAuth   = true;                  // استفاده از SMTP authentication
					$mail->SMTPSecure = "tls";                 // استفاده از پروتکل امن    
					$mail->Port       = 587;                   // درگاه خروجی سرویس ایمیل گوگل  
					$mail->Username   = "amoozesh.daneshjooyar@gmail.com"; // نام کاربری حساب گوگل
					$mail->Password   = "09175148014";        // کلمه عبور حساب گوگل
					$mail->AddReplyTo('amoozesh.daneshjooyar@gmail.com', 'Daneshjooyar'); // افزودن پاسخ به ارسال کننده
					$mail->AddAddress($_POST['email'], 'Daneshjooyar'); // تنظیم آدرس گیرنده ایمیل
					$mail->SetFrom('amoozesh.daneshjooyar@gmail.com', 'Daneshjooyar'); // تنظیم قسمت ارسال کننده ایمیل
					$mail->Subject = ''.$_POST['subject'].''; // موضوع ایمیل
					$mail->AltBody = 'برنامه شما از این ایمیل پشتیبانی نمی کند، برای دیدن آن، لطفا از برنامه دیگری استفاده نمائید'; // متنی برای کاربرانی که نمی توانند ایمیل را به درستی مشاهده کنند
					$mail->CharSet = 'UTF-8'; // یونیکد برای زبان فارسی
					$mail->ContentType = 'text/html'; // استفاده از html  
					$mail->MsgHTML(''.$_POST['messagetext'].''); // متن پیام به صورت html
					$mail->Send(); // ارسال
					echo "<span style='text-align:center;color:green;'>ایمیل اسال شد</span>";
					} 
					catch (phpmailerException $e) 
					{
						echo $e->errorMessage(); // پیام خطا از phpmailer
					} 
					catch (Exception $e)
				    {
				 		 echo $e->getMessage(); // سایر خطاها
					}
 }
 ?>

</body>

</html>
