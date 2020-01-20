<?php
  /**************************
    该页面用于显示用户的信息
  ************************/
  //1.连接数据库

  include 'public_connect_mysql.php';



  //设置每页显示的数量
  $page_size = 5;

  $touch_id = isset($_GET['touch_id'])?$_GET['touch_id']:'';
  //解析结果集资源 -- 记录总数
  $sql_total = "select * from touch where id = '$touch_id'";
  $total_num = $dao -> total($sql_total);


  //计算最大页码，ceil向上取整
  $totalpage = ceil($total_num/$page_size);

  $page = isset($_GET['page'])?$_GET['page']:1;

  //计算偏移量
  $offset = ($page-1)*$page_size;
  $sql = "select * from touch where id = '$touch_id' limit {$offset},{$page_size}";

  $result = $dao -> fetchOne($sql);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../public/css/index.css">
     <title></title>
   </head>
   <body>
     <div class="main">
       <form class="" action="index.html" method="post">
         <table width= 100%  border = 1 text-align = "center">
           <tr>
             <th>ID</th>
             <th>姓名</th>
             <th>地址</th>
             <th>电话</th>
             <th>邮箱</th>
           </tr>

           <tr>
             <td><?php echo $result['id']; ?></td>
             <td><?php echo $result['name']; ?></td>
             <td><?php echo $result['addr']; ?></td>
             <td><?php echo $result['tel']; ?></td>
             <td><?php echo $result['email']; ?></td>
           </tr>

         </table>
       </form>
     </div>

   </body>
 </html>
