<li>
                      <input type="text" class="form-control search" placeholder="جستجو">
 </li>
<li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" src="http://www.gravatar.com/avatar/<?php echo md5($_SESSION['useremail']); ?>?s=50&d=identicon">
                          <span class="username"><?php echo $_SESSION['fname'].' '. $_SESSION['lname']; ?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <li><a href="#"><i class=" icon-suitcase"></i>حساب کاربری</a></li>
                          <li><a href="#"><i class="icon-cog"></i> تنظیمات</a></li>
                          <li><a href="#"><i class="icon-bell-alt"></i> اطلاع رسانی</a></li>
                          <li><a href="login.html"><i class="icon-key"></i> خروج</a></li>
                      </ul>
 </li>