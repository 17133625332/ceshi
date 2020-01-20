<?php

  session_start();
  //引用操作数据库的文件
  include 'public_connect_mysql.php';
  include '../public/divide_pages.php';
  header("content-type:text/html; charset=utf-8");


  $query_comment = "select comment.*,shop.name as sname,user.id as uid from comment,user,shop where comment.user_id = user.id and comment.shop_id = shop.id";
  $total_num = $dao -> total($query_comment);
// echo $total_num;
  $res_comment = $dao -> query($query_comment);
  $result =  dividePages($total_num,$query_comment);
  // var_dump($result);
  // exit;
  $page = $_SESSION['page'];
  $totalpage = $_SESSION['totalpage'];



 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../public/css/index.css">
     <title></title>
   </head>
   <body class="main">
     <table width= 100%  border = 1 text-align = "center" >
       <tr>
         <th>编号</th>
         <th>用户</th>
         <th>商品</th>
         <th>评论</th>
         <th>时间</th>
         <th>删除</th>
       </tr>
       <?php foreach ($result as $key => $value): ?>
         <tr>
           <td><?php echo $value['id']; ?></td>
           <td><?php echo $value['uid']; ?></td>
           <td><?php echo $value['sname']; ?></td>
           <td><?php echo $value['content']; ?></td>
           <td><?php echo date('Y-m-d',$value['time']); ?></td>
           <td>
              <a href="./delete.php?id=<?php echo $value['id']; ?>&&page=<?php echo isset($_GET['page'])?$page=$_GET['page']:$page=''; ?>">删除</a>
           </td>
         </tr>
       <?php endforeach; ?>
       <tr >

         <td colspan="5">
          <a href="index.php?page=1">首页</a>
          <a href="index.php?page=<?php echo $page<=1?1:$page-1; ?>">上一页</a>
          <a href="index.php?page=<?php echo $page>=$totalpage?$totalpage:$page+1; ?>">下一页</a>
          <a href="index.php?page=<?php echo $page = $totalpage; ?>">尾页</a>
         </td>
       </tr>
     </table>
   </body>
 </html>
