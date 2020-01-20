<?php
//首先判断用户是否已经登录成功
session_start();
// echo $_SESSION['home_userid'];
// echo $_SESSION['home_userid'];
// echo 1111;
// echo $_SESSION['home_userid'];
// var_dump(isset($_SESSION['home_userid']));
// exit;
if(!isset($_SESSION['home_userid'])){
  echo "<script>location='../login.php'</script>";
}else{

}


 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>分类页面</title>
    <link rel="stylesheet" href="../public/css/index.css">
  </head>
  <body>
    <div class="main">
<!-- 头部 -->
      <?php
        include '../header.php';
       ?>
<!-- 分割线 -->
       <div class="nav">

       </div>
<!-- 内容 -->
       <div class="content" >
<!-- 购物车 -->
         <div class="floor">
             <div class="floor_header">
               <div class="floor_header_left">
                 <span><a href="./index.php">个人中心</a></span>
               </div>

             </div>
             <div class="floor_bottom3">
               <div class="floor_bottom3_left">
                 <ul class = "floor_bottom3_left_ul">
                   <li><a href="./orderlist.php"><span>查看联系方式</span></a></li>
                   <li><a href="./useradd.php"><span>添加联系方式</span></a></li>
                   <li><a href="./userlist.php"><span>查看订单</span></a></li>
                 </ul>
               </div>

               <div class="floor_bottom3_right">

                 <!-- 通过switch来确定点击右边按钮时显示的内容 -->
                 <?php
                    $c = isset($_GET['c'])?$_GET['c']:'wel';
                    switch ($c) {
                      //注意：当显示胡内容较多时可以引用外部的一个文件
                      case 'wel':
                          echo "
                          <h2>欢迎回家</h2>
                          <div class = 'floor_bottom3_right_background'></div>
                          ";
                        break;
                      case 'userlist':
                          echo "
                          <h2>查看用户信息</h2>
                          <div class = 'floor_bottom3_right_background'></div>
                          ";
                        break;
                      case 'useradd':
                          echo "
                          <h2>添加用户信息</h2>
                          <div class = 'floor_bottom3_right_background'></div>
                          ";
                        break;
                      case 'orderlist':
                          echo "
                          <h2>查看订单</h2>
                          <div class = 'floor_bottom3_right_background'></div>
                          ";
                        break;

                      default:
                        // code...
                        break;
                    }
                  ?>

               </div>

             </div>
         </div>
       </div>
       <div class="index_clear">

       </div>
<!-- 底部 -->
    <?php
      include '../footer.php';
     ?>

  </body>
</html>
