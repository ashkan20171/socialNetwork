<?php
include '../check2.php';

include '../../funcs/connect.php';

if(isset($_POST['to']))
{
	$q="INSERT INTO `pm` (  `from` , `to` , `title` , `text` , `tarikh` , `saat` , `isread` , `isstar` , `isdelete` )
VALUES ( ?, ?, ?, ?, ?, ?, '0', '0', '0');";
	$stmt=$db->prepare($q);
	print_r( $stmt->errorInfo());	
	$stmt->bindParam(1,$_SESSION['useremail'],PDO::PARAM_STR);
	$stmt->bindParam(2,$_POST['to'],PDO::PARAM_STR);
	$stmt->bindParam(3,$_POST['title'],PDO::PARAM_STR);
	$stmt->bindParam(4,$_POST['text'],PDO::PARAM_STR);
	$stmt->bindParam(5,getCurrentDate(),PDO::PARAM_STR);	
	$stmt->bindParam(6,time(),PDO::PARAM_STR);
	
	$stmt->execute();
	
	if($stmt->rowCount())
	{
		$_SESSION['msg']="ارسال انجام شد";
	}
	else
	{
		$_SESSION['msg']="ارسال انجام نشد";
	}
	
	
	
	
	
}
 
?>
<!DOCTYPE html>
<script>
$(document).ready(function(e) {
    $.post("",{},function(date){
		
		});
	
});

</script>

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
              <!--mail inbox start-->
              <div class="mail-box">
                  <aside class="sm-side">
                      <div class="user-head">
                          <a href="javascript:;" class="inbox-avatar">
                              <img src="http://www.gravatar.com/avatar/<?php echo md5($_SESSION['useremail']); ?>?s=50&d=identicon" alt="">
                          </a>
                          <div class="user-name">
                              <h5><a href="#"><?php echo $_SESSION['fname'].' '. $_SESSION['lname']; ?></a></h5>
                              <span><a href="#"><?php echo $_SESSION['useremail']; ?></a></span>
                          </div>
                          <a href="javascript:;" class="mail-dropdown pull-right">
                              <i class="icon-chevron-down"></i>
                          </a>
                      </div>
                      <div class="inbox-body">
                          <a class="btn btn-compose" data-toggle="modal" href="#myModal">
                              ارسال پیام                         </a>
                          <!-- Modal -->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title">ارسال پیام</h4>
                                      </div>
                                      <div class="modal-body">
                                          <form class="form-horizontal" role="form" method="post">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">به</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" class="form-control" id="to" name="to" placeholder="">
                                                      <div id="res"></div><div id="res1"></div>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">عنوان</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" class="form-control" id="title" name="title" placeholder="">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">متن</label>
                                                  <div class="col-lg-10">
                                                      <textarea name="text" id="text" class="form-control" cols="30" rows="10"></textarea>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                      <span class="btn green fileinput-button">
                                                        
                                                        
                                                        
                                                      </span>
                                                      <button type="submit" class="btn btn-send">ارسال</button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                      </div>
                    <ul class="inbox-nav inbox-divider">
                          <li class="active">
                              <a href="#" id="daryafti"><i class="icon-inbox"></i> پیام های دریافتی 
                              <span class="label label-danger pull-right" title="تعداد پیام های خوانده نشده">
                              
                              <?php echo get_unreadpm($_SESSION['useremail']); ?>
                              
                              </span></a>

                          </li>
                          <li>
                              <a href="#" id="ersali"><i class="icon-envelope-alt"></i> پیام های ارسالی
                              <span class="label label-danger pull-right" title="تعداد پیام های ارسالی">
                              
                              <?php echo get_sentpm($_SESSION['useremail']); ?>
                              
                              </span>
                              </a>
                          </li>
                          <li>
                              <a href="#"><i class="icon-bookmark-empty"></i> پیام های ستارهدار</a>
                          </li>
                          <li>
                              <a href="#"><i class=" icon-external-link"></i> پیشنوس <span class="label label-info pull-right">30</span></a>
                          </li>
                          <li>
                              <a href="#"><i class=" icon-trash"></i> سطل زباله</a>
                          </li>
                      </ul>
<div class="inbox-body text-center"></div>

                  </aside>
                  <aside class="lg-side" id="divdaryafti">
                      <div class="inbox-head">
                          <h3>پیام های دریافتی</h3>
                          <form class="pull-right position" action="#">
                              <div class="input-append">
                                  <input type="text"  placeholder="Search Mail" class="sr-input">
                                  <button type="button" class="btn sr-btn"><i class="icon-search"></i></button>
                              </div>
                          </form>
                      </div>
                    <div class="inbox-body">
                      <div class="mail-option">
                             <div class="chk-all">
                                 <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                                

                         
                       </div>
                        <table class="table table-inbox table-hover">
                          <tbody>
                            <tr class="unread">
                                <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                </td>
                                <td class="inbox-small-cells"><i class="icon-star"></i></td>
                                <td class="view-message  dont-show">از</td>
                                <td class="view-message ">عنوان</td>
                                <td class="view-message  "><i class="">تاریخ</i></td>
                                <td class="view-message  ">ساعت</td>
                                
                            </tr>
                            <?php
					$q="SELECT * FROM `pm` WHERE `to` like '".$_SESSION['useremail']."' and `isdelete`=0 order by isread, tarikh desc ";
					//echo $q;
					$s=$db->prepare($q);
					$s->execute();
					echo $s->rowCount();
					while($row=$s->fetch())
					{
						$isread="unread";
						if($row['isread']==1)
						$isread="";
                      
					  echo '<tr class="'.$isread.'">
                                <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                </td>
                                <td class="inbox-small-cells"><i class="icon-star"></i></td>
                                <td class="view-message  dont-show">'.$row['from'].'</td>
                                <td class="view-message ">'.$row['title'].'</td>
                                <td class="view-message  "><i class="">'.$row['tarikh'].'</i></td>
                                <td class="view-message  ">'.$row['saat'].'</td>
                                
                            </tr>';
					}
							?>
                            
                          </tbody>
                        </table>
                      </div>
                  </aside>
                  
                  
                  
                  
                  
                  <aside class="lg-side" id="diversali" style="display:none">
                      <div class="inbox-head">
                          <h3>پیام های ارسالی</h3>
                          <form class="pull-right position" action="#">
                              <div class="input-append">
                                  <input type="text"  placeholder="Search Mail" class="sr-input">
                                  <button type="button" class="btn sr-btn"><i class="icon-search"></i></button>
                              </div>
                          </form>
                      </div>
                    <div class="inbox-body">
                      <div class="mail-option">
                             <div class="chk-all">
                                 <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                                

                         
                       </div>
                        <table class="table table-inbox table-hover">
                          <tbody>
                            <tr class="unread">
                                <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                </td>
                                <td class="inbox-small-cells"><i class="icon-star"></i></td>
                                <td class="view-message  dont-show">به</td>
                                <td class="view-message ">عنوان</td>
                                <td class="view-message  "><i class="">تاریخ</i></td>
                                <td class="view-message  ">ساعت</td>
                                
                            </tr>
                            <?php
					$q="SELECT * FROM `pm` WHERE `from` like '".$_SESSION['useremail']."' and `isdelete`=0 order by tarikh desc ";
					//echo $q;
					$s=$db->prepare($q);
					$s->execute();
					echo $s->rowCount();
					while($row=$s->fetch())
					{
						
						
                      
					  echo '<tr class="">
                                <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                </td>
                                <td class="inbox-small-cells"><i class="icon-star"></i></td>
                                <td class="view-message  dont-show">'.$row['to'].'</td>
                                <td class="view-message ">'.$row['title'].'</td>
                                <td class="view-message  "><i class="">'.$row['tarikh'].'</i></td>
                                <td class="view-message  ">'.$row['saat'].'</td>
                                
                            </tr>';
					}
							?>
                            
                          </tbody>
                        </table>
                      </div>
                  </aside>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
              </div>
              <!--mail inbox end-->
          </section>
      </section>
      
      <!--main content end-->
  </section>

   

<?php include '../js2.php'; ?>
<script language="javascript">
$(document).ready(function(e) {
   
    $("#ersali").click(function(){
		$("#diversali").show();
		$("#divdaryafti").hide();
		});
		
		$("#daryafti").click(function(){
		$("#diversali").hide();
		$("#divdaryafti").show();
		});
		
		
		$("#to").blur(function(){
			
			$.get("../../checkmail.php",{email:$(this).val()},function(data){
				//$("#res").html(data);
				$(this).css("color","red");
				});
			
			});
			
			$("#to").keyup(function(e) {
              
			  $.get("../../checkmail.php",{s:$(this).val()},function(data){
				$("#res1").html(data);
				//$(this).css("color","red");
				});
				 
            });
			
		
});

function setval(x)
{
	//alert(x);
document.getElementById('to').value=x;
	document.getElementById('c1').style.display='none';
}
</script>
  </body>
</html>
