<?php
  /**************************
    该页面用于显示用户的信息
  ************************/
  //1.连接数据库

  include 'public_connect_mysql.php';


  // //发送sql查询语句
  // $total_sql = "select * from brand";
  // //查询结果集
  // $total_res = $dao -> query($total_sql);
  //

  //设置每页显示的数量
  $page_size = 5;

  //解析结果集资源 -- 记录总数
  $total_sql2 = "select count(*) as num from brand";
  $total = $dao -> query($total_sql2);

  $total_num = $total[0]['num'];


  //计算最大页码，ceil向上取整
  $totalpage = ceil($total_num/$page_size);

  $page = isset($_GET['page'])?$_GET['page']:1;

  //计算偏移量
  $offset = ($page-1)*$page_size;
  $sql = "select brand.id, brand.name, class_id,class.name as cname from brand,class where brand.class_id = class.id limit {$offset},{$page_size}";
  $result = $dao -> query($sql);
  $sql1 = "select * from brand";
  $res2 = $dao->query($sql1);

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
             <th>编号</th>
             <th>商品名称</th>
             <th>商品类别</th>
             <th>修改</th>
             <th>删除</th>
           </tr>
           <?php foreach ($rows as $key => $value): ?>
           <tr>
             <td><?php echo $value['id']; ?></td>
             <td><?php echo $value['name']; ?></td>
             <td><?php echo $value['cname']; ?></td>

             <td>
               <a href="./edit.php?id=<?php echo $value['id'];?>&&name=<?php echo $value['name'];?>&&class_id=<?php echo $value['class_id'];?>&&cname=<?php echo $value['cname']; ?>">修改</a>
             </td>
             <td>
               <a href="./delete.php?id=<?php echo $value['id']; ?>&&page=<?php echo isset($_GET['page'])?$page=$_GET['page']:$page=1; ?>">删除</a>
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
       </form>
     </div>

   </body>
 </html>
