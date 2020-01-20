
 <?php
   /**************************
     该页面用于显示用户的信息
   ************************/
   //1.连接数据库

   include 'public_connect_mysql.php';
   session_start();

   //接受传过来的订单，注意当同时购买多件商品时，不能再用订单id此时应该用订单号


   $shop_id = isset($_GET['shop_id'])?$_GET['shop_id']:'';
   $user_id = $_SESSION['home_userid'];

   // $sql = "select indent.price,indent.num,shop.name,shop.img from indent,shop where indent.shop_id = shop.id and indent.code ='{$code}'";
   //
   // $result = $dao -> query($sql);

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
   // $sql = "select indent.price,indent.num,indent.confirm,shop.name,shop_id,shop.img from indent,shop where indent.shop_id = shop.id and indent.code ='{$code}' limit {$offset},{$page_size}";

   // $result1 = $dao -> query($sql);

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
        <form class="" action="./commentinsert.php" method="post">
          <input type="hidden" name="shop_id" value="<?php echo $shop_id; ?>">
          <textarea style="padding-left:19px;padding-top:15px;padding-right:10px;" name="content" rows="8" cols="80" placeholder="请发表评论内容"></textarea><br /><br />
          <input type="submit" name="" value="提交">

        </form>
      </div>

    </body>
  </html>
