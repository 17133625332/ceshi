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

          <a href="<?php echo $root; ?>/home/index.php">首页</a>
          <?php
              if(!isset($_SESSION['home_userid'])){
              ?>
              <a href="<?php echo $root; ?>/home/login.php">登录</a>
              <a href="<?php echo $root; ?>/home/reg.php">注册</a>
              <?php
              }else{
                  echo "<span><a href = './person/index.php'>尊敬的--{$_SESSION['username']} 欢迎您<a><span><a href = 'logout.php'>推出</a>";
                }
           ?>



          <a href="<?php echo $root; ?>/home/person/index.php">个人中心</a>
          <a href="<?php echo $root; ?>/home/cat/index.php">购物车</a>
        </div>
    </div>
  </body>
</html>
