<?php
  include './public_connect_mysql.php';

  session_start();
  $sqlAdvert = "select * from advert";
  $resAdvert = $dao -> query($sqlAdvert);
  $arrRes = array();

  //存放广告
  foreach ($resAdvert as $key => $value) {
    $arrRes[$value['pos']] = $value;
  }

  //查看分类用于控制楼层
  $query_class = "select * from class";
  $res_class = $dao -> query($query_class);

  //查看商品中的信息，包括图片，名称，价格


 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>index</title>
    <link rel="stylesheet" href="public/css/index.css">
  </head>
  <body>
    <div class = "main">


        <?php
            include './header.php';
         ?>

        <div class="nav">

        </div>

        <div class="ads">
          <img width = 100% height =200px  src="../admin/public/uploads/<?php echo $arrRes[1]['img']; ?>" alt="aaaa">
        </div>
        <div class="nav">

        </div>
<!-- 内容部分 -->
        <div class="content">
          <?php $floor = 1; ?>
          <?php foreach ($res_class as $key => $value): ?>
            <?php
        //查找每层中相应的商品
                $query_shop = "select shop.* from shop,class,brand where shop.brand_id = brand.id and brand.class_id = class.id and class.id = '{$value['id']}' and shop.shelf = 1 order by rand() limit 4";

                $res_shop = $dao -> query($query_shop);

             ?>
            <div class="floor">
                <div class="floor_header">
                  <div class="floor_header_left">
                    <span><?php echo $floor; ?>F  <?php echo $value['name']; ?></span>
                  </div>
                  <div class="floor_header_right">
                    <span>热销产品</span>
                    <span><a href="./class.php?class_id=<?php echo $value['id']; ?>&&class_name=<?php echo $value['name']; ?>">更多</a></span>
                  </div>
                </div>
                <div class="floor_bottom">
                  <?php $shopping_id = -1; ?>
                  <?php foreach ($res_shop as $key1 => $value1): ?>

                    <a href="./shop.php?id=<?php echo $value1['id']; ?>&&class_id=<?php echo $value['id']; ?>&&brand_id=<?php echo $value1['brand_id']; ?>&&brand_name=<?php echo $value['name']; ?>">
                      <div class="shop">

                        <div class="shopImg">
                          <img width = 200px height = 200px src="../admin/public/uploads/thumb_<?php echo $value1['img']; ?>" alt="">
                        </div>
                        <div class="shopInfo">
                          <span class = "shopName"><?php echo $value1['name']; ?></span>
                          <span class = "shopPrice"><?php echo $value1['price']; ?></span>
                        </div>
                      </div>
                    </a>
                    <?php
                      $shopping_id = $value1['id'];
                     ?>
                  <?php endforeach; ?>

                </div>
            </div>
            <?php $floor = $floor + 1; ?>
          <?php endforeach; ?>

        <div class="nav">

        </div>
        <div class="ads">
          <img width = 100% height =200px src="../admin/public/uploads/<?php echo $arrRes[1]['img']; ?>" alt="">
        </div>
        <div class="nav">

        </div>

<!--底部部分  -->
        <?php
            include './footer.php';
         ?>


    </div>


  </body>
</html>
