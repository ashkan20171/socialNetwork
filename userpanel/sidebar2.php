<ul class="sidebar-menu">
                  <li class="">
                      <a class="" href="">
                          <i class="icon-dashboard"></i>
                          <span>داشبورد</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>پروفایل</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="general.html">ویرایش اطلاعات</a></li>
                          <li><a class="" href="buttons.html">ثبت نام</a></li>
                           <li><a class="" href="../sms/registertell.php">ثبت شماره همراه</a></li>
                           <li><a class="" href="../sms/activetell.php">تایید شماره همراه</a></li>
                      </ul>
                  </li>
                  
                  
                   <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>مالی</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="../sharge/sharge.php">افزایش موجودی</a></li>
                          <?php $m=get_mojoodi($_SESSION['useremail']);
						  if(intval($m>70000))
						  echo '  <li><a class="" href="../sharge/index.php">مشاهده پرداختی های من</a></li>';
                          ?>
                          
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>اس ام اس پنل</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                            <li><a class="" href="../sms/sendsms.php">ارسال پیام</a></li>
                            <li><a class="" href="../sms/index.php">مشاهده ارسالی های من</a></li>';
                          
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="../pm/index.php" class="">
                          <i class="icon-book"></i>
                          <span>مدریت پیام ها  </span>
                          <span class="arrow"></span>
                      </a>
                      
                  </li>
                  <li>
                      <a class="" href="">
                          <i class="icon-user"></i>
                          <span>خروج</span>
                      </a>
                  </li>
              </ul>