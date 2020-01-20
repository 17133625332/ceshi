<?php
    include './public_connect_mysql.php';
    // print_r($_GET);
    session_start();


    isset($_GET['class_id'])?$class_id = $_GET['class_id']:$class_id='';
    // echo $class_id;
     // $_SESSION['class_id'] = $class_id;
     // $class_id = $_SESSION['class_id'];
    isset($_GET['class_name'])?$class_name = $_GET['class_name']:$class_name='';

 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>分类页面</title>
    <link rel="stylesheet" href="public/css/index.css">
  </head>
  <body>
    <div class="main">
<!-- 头部 -->
      <?php
        include './header.php';
       ?>
<!-- 分割线 -->
       <div class="nav">

       </div>
<!-- 内容 -->
       <div class="content">
         <div class="floor">
             <div class="floor_header">
               <div class="floor_header_left">

                 <a href="./index.php">首页</a>  &raquo;

                 <span><?php echo $class_name; ?></span>
               </div>
               <div class="floor_header_right">
<!-- 显示该分类哪些品牌 -->
                <?php
                  $brand_sql = "select * from brand where brand.class_id = '{$class_id}'";
                  $brand_res = $dao -> query($brand_sql);

                 ?>
<!-- 显示某个分类下的品牌 -->
                 <?php foreach ($brand_res as $key => $value): ?>
                   <!-- <?php echo print_r($_GET); ?> -->
                    <a href="class.php?class_id=<?php echo $class_id ?>&&brand_id=<?php echo $value['id']; ?>&&class_name=<?php echo $class_name; ?>"><span><?php echo $value['name']; ?></span></a>
                 <?php endforeach; ?>
               </div>
             </div>
             <div class="floor_bottom2">
<!-- 循环便利输出品牌内容 -->
             <?php

                isset($_GET['brand_id'])?$brand_id=$_GET['brand_id']:$brand_id=$brand_res[0]['id'];
                $shop_sql = "select * from shop where  brand_id = {$brand_id}";
                $shop_res = $dao -> query($shop_sql);

              ?>
              <?php foreach ($shop_res as $key => $value): ?>

                <a href="./shop.php?id=<?php echo $value['id']; ?>&&brand_id=<?php echo $value['brand_id'] ?>">
                  <div class="shop">

                    <div class="shopImg">
                      <img src="../admin/public/uploads/thumb_<?php echo $value['img']; ?>" alt="">
                    </div>
                    <div class="shopInfo">
                      <span class = "shopName"><?php echo $value['name']; ?></span>
                      <span class = "shopPrice"><?php echo $value['price']; ?></span>
                    </div>
                  </div>
                </a>
              <?php endforeach; ?>



               <!-- 清除浮动 -->
               <div class="clear">

               </div>
             </div>
         </div>
       </div>

<!-- 分割线 -->
       <div class="nav">

       </div>
<!-- 底部 -->
      <?php
        include './footer.php';
       ?>

    </div>

  </body>
</html>
