<?php require('../check2.php'); ?>
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             لیست کلیه کاربران ثبت شده در سیستم
                          </header>
                          <table class="table table-striped border-top" id="sample_1" dir="rtl" border="1">
                          <thead>
                          <tr align="center">
                              <th class="hidden-phone">تصویر </th>
                              
                              <th align="center"><a href="?orderby=email <?php if($_GET['orderby']=="email") echo "desc"; ?>">نام کاربری </a></th>
                              <th class="hidden-phone"><a href="?orderby=lname <?php if($_GET['orderby']=="lname") echo "desc"; ?>">نام</a></th>
                              <th class="hidden-phone"><a href="?orderby=disabled <?php if($_GET['orderby']=="disabled") echo "desc"; ?>">وضعیت کاربر</a></th>
                              <th class="hidden-phone"><a href="?orderby=signupdate <?php if($_GET['orderby']=="signupdate") echo "desc"; ?>">تاریخ ثبت نام</a></th>
                              <th class="hidden-phone"><a href="?orderby=typeofuser <?php if($_GET['typeofuser']=="email") echo "desc"; ?>">نوع کاربر</a></th>
                              <th class="hidden-phone">عملیات</th>
                          <th style="width:8px; text-align:center" align="center"><input type="checkbox" class="" data-set="" onclick='if(this.checked==true) $("#ch1").attr("checked", true); else $("#ch1").attr("checked", False); ' /></th>
                          </tr>
                          </thead>
                          <tbody >
                          <?php 
						  $order="";
						 
						if(isset($_GET['orderby']))
							$order=" order by ". checkInput($_GET['orderby']);
						$r=@$db->query("select * from tblusers $order");
						while($row=@$r->fetch())
						{
							if($row['disabled']==0)
								$s="<a href='javascript://' onClick=\"ajax('users/changestatus.php?email=".$row["email"]."&flag=1','main-content')\" title='برای غیر فعال کردن کاربر کلیک کنید'><font color=green>تایید شده</font></a>";
							else
								$s="<a href='javascript://' onClick=\"ajax('users/changestatus.php?email=".$row["email"]."&flag=0','main-content')\" title='برای فعال کردن کاربر کلیک کنید'><font color=red>تایید نشده</font></a>";
							
						echo'						  
						  <tr class="odd gradeX">
							  <td><img src="http://www.gravatar.com/avatar/'.md5($row['email']).'?s=50&d=identicon"></td>
							  
							  <td>'.$row["email"].'</td>
							  <td class="hidden-phone">'.$row["fname"].' '.$row['lname'].'</td>
							  <td class="hidden-phone" align=center>'.$s.'</td>
							  <td class="center hidden-phone">'.$row['signupdate'].'</td>
							  <td class="hidden-phone"><span class="label label-success">'.$row['typeofuser'].'</span></td>
							  <td class="hidden-phone"><a href="javascript://" onclick="ajax(\'users/del.php?email='.$row['email'].'\'  ,\'main-content\')" ><img src="../img/b_drop.png" width=16 height=16></a></td>
						  <td><input type="checkbox" class="checkboxes" value="1" id="ch1" /></td>
						  </tr>';
												  
												  
						}
						  
						  ?>
                          
                          </tbody>
                          </table>
                          <div id="id1"></div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  