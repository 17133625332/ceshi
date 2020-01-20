<?php

    session_start();
    include './public_connect_mysql.php';

    $user_id = $_SESSION['home_userid'];

    $touch_sql = "select * from touch where user_id = {$user_id}";

    $touch_res = $dao -> query($touch_sql);

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
                 <table width = 100% border="1px">
                   <tr>
                     <th>姓名</th>
                     <th>地址</th>
                     <th>电话</th>
                     <th>邮箱</th>
                     <th>修改</th>
                     <th>删除</th>
                   </tr>
                   <?php foreach ($touch_res as $key => $value): ?>
                     <tr>
                       <td><?php echo $value['name']; ?></td>
                       <td><?php echo $value['addr']; ?></td>
                       <td><?php echo $value['tel']; ?></td>
                       <td><?php echo $value['email']; ?></td>
                       <td><a href="useredit.php?id=<?php echo $value['id']; ?>">修改</a></td>
                       <td><a href="orderDelete.php?id=<?php echo $value['id']; ?>">删除</a></td>
                     </tr>
                   <?php endforeach; ?>
                 </table>
               </div>

             </div>
         </div>
       </div>
       <div class="useradd_clear">

       </div>
<!-- 底部 -->
    <?php
      include '../footer.php';
     ?>

  </body>
</html>
