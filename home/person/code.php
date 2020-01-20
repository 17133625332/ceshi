<?php
  /**************************
    该页面用于显示用户的信息
  ************************/
  //1.连接数据库

  include 'public_connect_mysql.php';


  //接受传过来的订单，注意当同时购买多件商品时，不能再用订单id此时应该用订单号
  $code = $_GET['code'];

  $sql = "select indent.price,indent.num,shop.name,shop.img from indent,shop where indent.shop_id = shop.id and indent.code ='{$code}'";

  $result = $dao -> query($sql);

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
  $sql = "select indent.price,indent.num,indent.confirm,shop.name,shop_id,shop.img from indent,shop where indent.shop_id = shop.id and indent.code ='{$code}' limit {$offset},{$page_size}";

  $result1 = $dao -> query($sql);

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
             <th>名称</th>
             <th>图片</th>
             <th>价格</th>
             <th>数量</th>
             <th>合计</th>
             <th>法表评论</th>
           </tr>

           <?php foreach ($result1 as $key => $value): ?>
             <tr style="text-align:center;">
               <td><?php echo $value['name']; ?></td>
               <td>
                 <img width = 100px height = 100px src="../../admin/public/uploads/thumb_<?php echo $value['img']; ?>" alt="">
               </td>
               <td><?php echo $value['price']; ?></td>
               <td><?php echo $value['num']; ?></td>
               <td ><?php echo $value['price']*$value['num']; ?></td>
               <td>
                 <a href="comment.php"> <?php if($value['confirm'] == 1){
                   echo "<a href='comment.php?shop_id={$value['shop_id']}'>发表评论</a>";
                 }else{
                   // echo "<script>alert('请先确定收货')</script>";
                   // echo "<script>location='userlist.php'</script>";
                   echo "<a href='userlist.php' style='#888' onclick=\"alert('请先确定订单')\"
                   >评论</a>";
                 } ?></a>
               </td>
             </tr>
           <?php endforeach; ?>
         </table>
       </form>
     </div>

   </body>
 </html>
