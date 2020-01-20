<?php
  /**************************
    该页面用于显示用户的信息
  ************************/
  //1.连接数据库

  include 'public_connect_mysql.php';



  //设置每页显示的数量
  $page_size = 5;

  //解析结果集资源 -- 记录总数
  $sql_total = "select indent.*,user.username,status.name from indent,user,status where indent.user_id = user.id and indent.status_id = status.id group by code";
  $total_num = $dao -> total($sql_total);



  //计算最大页码，ceil向上取整
  $totalpage = ceil($total_num/$page_size);

  $page = isset($_GET['page'])?$_GET['page']:1;

  //计算偏移量
  $offset = ($page-1)*$page_size;
  $sql = "select indent.*,user.username,status.name as sname from indent,user,status where indent.user_id = user.id and indent.status_id = status.id  group by code limit {$offset},{$page_size}";
  $result = $dao -> query($sql);


  $rows = array();
  foreach ($result as $key => $value) {
    // code...
    $rows[] = $value;

    $_SESSION['page'] = $page;


  }
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
             <th>订单号</th>
             <th>用户</th>
             <th>下单时间</th>
             <th>订单状态</th>
             <th>联系方式</th>
             <th>修改</th>
             <th>删除</th>
           </tr>

           <?php foreach ($result as $key => $value): ?>
           <tr>
             <td><?php echo $value['id']; ?></td>
             <td>
               <a href="./code.php?code=<?php echo $value['code']; ?>"><?php echo $value['code']; ?></a>
             </td>
             <td><?php echo $value['username']; ?></td>
 <!--注意订单时间不能以时间戳的方式显示，应该人性化以日期的形式显示 -->
             <td><?php echo date('Y-m-d: H:i:s',$value['time']); ?></td>
             <td><?php echo $value['sname']; ?></td>
             <td>
               <a href="./touch.php?touch_id=<?php echo $value['touch_id']; ?>">联系方式</a>
             </td>
             <td>
               <a href="./edit.php?code=<?php echo $value['code'];?>&&status_id=<?php echo $value['status_id']; ?>">修改</a>
             </td>
             <td>
               <a href="./delete.php?code=<?php echo $value['code']; ?>&&page=<?php echo isset($_GET['page'])?$page=$_GET['page']:$page=1; ?>">删除</a>
             </td>
           </tr>


           <?php endforeach; ?>

            <tr >

              <td colspan="5">
               <a href="index.php?page=1">首页</a>
               <a href="index.php?page=<?php echo $page<=1?1:$page-1; ?>">上一页</a>
               <a href="index.php?page=<?php echo $page>=$totalpage?($totalpage==0?1:$totalpage):$page+1; ?>">下一页</a>
               <a href="index.php?page=<?php if($totalpage){$page=$totalpage;}else{$page=1;}echo $page;?>">尾页</a>
              </td>
            </tr>
         </table>
       </form>
     </div>

   </body>
 </html>
