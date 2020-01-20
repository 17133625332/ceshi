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
  $page_size = 10;

  //解析结果集资源 -- 记录总数
  $sql_total = "select shop.*, brand.name as bname, class.name as cname from brand,class,shop where shop.brand_id = brand.id and brand.class_id = class.id";

  $total_num = $dao -> total($sql_total);



  //计算最大页码，ceil向上取整
  $totalpage = ceil($total_num/$page_size);

  $page = isset($_GET['page'])?$_GET['page']:1;

  //计算偏移量
  $offset = ($page-1)*$page_size;
  $sql = "select shop.*, brand.name as bname, class.name as cname from brand,class,shop where shop.brand_id = brand.id and brand.class_id = class.id  limit {$offset},{$page_size}";
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
             <th>编号</th>
             <th>名称</th>
             <th>图片</th>
             <th>价格</th>
             <th>库存</th>
             <th>货架</th>
             <th>品牌</th>
             <th>分类</th>
             <th>修改</th>
             <th>删除</th>
           </tr>

           <?php foreach ($result as $key => $value): ?>
           <tr>
             <td><?php echo $value['id']; ?></td>
             <td><?php echo $value['name']; ?></td>
             <td><img width = 50px height = 50px src="../public/uploads/<?php echo $value['img']; ?>" alt=""></td>
             <td><?php echo $value['price']; ?></td>
             <td><?php echo $value['stock']; ?></td>
             <td><?php
             if($value['shelf']==1){
               echo '上架';
             }else{
               echo '下架';
             }

             ?></td>
             <td><?php echo $value['bname']; ?></td>
             <td><?php echo $value['cname']; ?></td>


             <td>
               <a href="./edit.php?id=<?php echo $value['id'];?>">修改</a>
             </td>
             <td>
               <a href="./delete.php?id=<?php echo $value['id']; ?>&&img=<?php echo $value['img']; ?>&&page=<?php echo isset($_GET['page'])?$page=$_GET['page']:$page=1; ?>">删除</a>
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
