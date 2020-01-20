<?php
  include 'public_connect_mysql.php';

  $query_sql = "select * from class";


  $query_res = $dao->query($query_sql);


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../public/css/index.css">
  </head>
  <body>
    <div class="main">
      <!-- 面临file必须添加enctype属性 -->
      <form class="form" action="insert.php" method="post" enctype = 'multipart/form-data'>
        <p>名称</p>
        <input type="text" name="name" value="" placeholder="添加类别">

        <p>
        <p>价格</p>
        <p><input type="text" name="price" value=""></p>

        <p>库存</p>
        <p><input type="text" name="stock" value=""></p>

        <p>货架</p>
        <p>
          <!-- lable的作用就是点击里面的内容就会被选中 -->
          <label >
              <input type="radio" name="shelf" value="1" checked>上架
          </label>
          <label >
              <input type="radio" name="shelf" value="0">下架
          </label>
        </p>


        <p>品牌</p>
        <p>
          <select class="" name="brand_id">
            <?php
              foreach ($query_res as $key => $value) {
                // code...
                $sql2 = "select * from brand where class_id = '{$value['id']}'";
                $res2 = $dao -> query($sql2);
                echo "<option disabled = '' >{$value['name']}</option>";
                foreach ($res2 as $key1 => $value1) {

                  echo "<option value = '{$value1['id']}'>   |---{$value1['name']}</option>";
                }
              }
             ?>
          </select>
        </p>

        <p>选择图片</p>
        <p>  <input type="file" name="img" value=""></p>

        <p>
          <input type="submit"  value="添加">
        </p>
      </form>
    </div>
  </body>
</html>
