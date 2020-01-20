<?php
  include './public_connect_mysql.php';
  session_start();

  $sql_indent = "select indent.*,name  from indent,status where user_id = {$_SESSION['home_userid']} and status.id = indent.status_id group by code";
  $res_indent = $dao -> query($sql_indent);



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

               <div class="floor_bottom5_right">
                 <table  border="1px">
                   <tr>
                     <th>订单号</th>
                     <th>下单时间</th>
                     <th>订单状态</th>
                     <th>确认收货</th>
                   </tr>
                   <?php 
                    // var_dump($res_indent);
                    ?>
                   <?php foreach ($res_indent as $key => $value): ?>
                     <tr>
                       <td><a href="./code.php?code=<?php echo $value['code']; ?>"><?php echo $value['code']; ?></a></td>
                       <td><?php echo $value['time']; ?></td>
                       <td><?php echo $value['name']; ?></td>
                       <td>

                           <?php
                              if($value['confirm'] == 0 ){
                                echo "<a href='./config.php?code={$value['code']}'>确认</a>";
                              }else{
                                  echo "<a href='./code.php?code={$value['code']}'>评论</a>";
                              }
                            ?>
                      </td>
                     </tr>
                   <?php endforeach; ?>
                 </table>
               </div>

             </div>
         </div>
       </div>
       <div class="userlist_clear">

       </div>
<!-- 底部 -->
    <?php
      include '../footer.php';
     ?>

  </body>
</html>
