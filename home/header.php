<?php

  // session_start();
  //获取系统的所有信息
  // var_dump($_SERVER);
  $path = $_SERVER['PHP_SELF'];

  $arr = explode("/",$path);

  //获得网站根目录
  $root = '/'.$arr[1];

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="header">
        <div class="headerlogo" style="margin-top:5px">
          <a href="#">
            <span>
              <div class="">
                  <img  width = 65px height = 46px src="<?php echo $root; ?>/home/public/images/wangzhan.png" alt="">
              </div>
            </span>
          </a>

        </div>
        <div class="head_left">
          <span>菜鸟工作室</span>
        </div>
        <div class="head_right">
          <?php

            if(isset($_SESSION['home_userid'])){
              //表示已经登录，不必显示注册登录按钮，只需显示欢迎该用户以及推出
              // echo "<a>$_SESSION['username']</a>";
              //点击退出清session

              echo "<a href='$root/home/person/index.php'>欢迎~{$_SESSION['username']} </a>";
              echo   "<a href='{$root}/home/logout.php'>退出</a>";
            }else{
              echo   "<a href='{$root}/home/login.php'>登录</a>";
              echo   "<a href='{$root}/home/reg.php'>注册</a>";

            }

           ?>
          <a href="<?php echo $root; ?>/home/index.php">首页</a>


          <a href="<?php echo $root; ?>/home/person/index.php">个人中心</a>
          <a href="<?php echo $root; ?>/home/cat/index.php">购物车</a>
        </div>
    </div>
  </body>
</html>
