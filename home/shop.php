<?php

  include './public_connect_mysql.php';
  session_start();

  $shop_id = isset($_GET['id'])?$_GET['id']:'';
  $brand_id = isset($_GET['brand_id'])?$_GET['brand_id']:'';
  //通过传过来胡品牌找到相应胡分类
  $class_sql = "select * from class where id = (select class_id from brand where brand.id = $brand_id)";
  $class_res = $dao -> fetchOne($class_sql);



  $sql_shop = "select * from shop where id = '$shop_id'";

  $res_shop = $dao -> fetchOne($sql_shop);

  $res = "select user.username,comment.content from comment,user where comment.user_id = user.id and comment.shop_id = {$res_shop['id']}";
  // $sql_comment = "select comment.content user.* from user,comment where comment.user_id = 30 and comment.shop_id = $shop_id";
  $res_comment = $dao -> query($res);

  //品论内容分析
  /*
  评论表中用户id  商品id
  用户表中胡用户名
  select user.name,comment.text from comment,user where comment.user_id = user.id and comment.shop_id = shop.id
  */

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
       <div class="content" >
<!-- 商品 -->
         <div class="floor">
             <div class="floor_header">
               <div class="floor_header_left">
                 <span><a href="./class.php?class_id=<?php echo $class_res['id'] ?>&&class_name=<?php echo $class_res['name']; ?>&&brand_id=<?php echo $brand_id; ?>">品牌</a>  &raquo; </span>
                 <span><?php echo $res_shop['name']; ?></span>
               </div>

             </div>
             <div class="floor_bottom2">
               <table border = 1px width = 100% >
                 <tr align = "center">
                   <td>图片</td>
                   <td>价格</td>
                   <td>库存</td>
                   <td>购物车</td>
                 </tr>

                 <tr align = "center">
                   <td> <img src="../admin/public/uploads/thumb_<?php echo $res_shop['img']; ?>" alt=""></td>
                   <td><?php echo $res_shop['price']; ?></td>
                   <td><?php echo $res_shop['stock']; ?></td>
                 <!-- 点击购物车跳转套购物车界面 -->
                   <td> <a href="./cat/insert.php?shop_id=<?php echo $res_shop['id']; ?>"><img src="public/images/shop8.gif" alt=""></a></td>
                 </tr>
               </table>
             </div>
         </div>
<!-- 评论 -->
        <?php foreach ($res_comment as $key => $value): ?>
          <div class="comment_floor">
              <div class="floor_header">
                <div class="floor_header_left">
                  <span>商品评论</span>
                </div>
              </div>
              <div class="floor_bottom2_comment">
                <div class="floor_bottom2_comment_left">
                  <div class="floor_bottom2_comment_left_logo">
                    <img src="public/images/logo1.gif" alt="">
                  </div>
                  <div class="floor_bottom2_comment_left_name">
                    <span><?php echo $value['username']; ?></span>
                  </div>
                </div>
                <div class="floor_bottom2_comment_right">
                  <span><?php echo $value['content']; ?></span>
                </div>
              </div>
          </div>
        <?php endforeach; ?>

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
