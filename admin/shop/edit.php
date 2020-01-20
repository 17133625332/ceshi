<?php
  include 'public_connect_mysql.php';
  // print_r($_GET);

  isset($_GET['id'])?$id=$_GET['id']:$id='';
  $query_shop = "select * from shop where id = {$id}";
  $res_shop = $dao -> fetchOne($query_shop);


  // $query_brand_class变量用于保存查询到的品牌及分类
  $query_brand_class = "select class.name as cname,class_id,brand.name as bname from brand,class,shop where brand.id = {$res_shop['brand_id']} and brand.class_id = class.id";
  $res_class = $dao -> fetchOne($query_brand_class);

  $query_class = "select * from class";
  $res_class = $dao -> query($query_class);

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
      <form class="form" action="update.php" method="post" enctype = 'multipart/form-data'>
        <!-- 商品的id -->
        <input type="text" name="id" hidden  value="<?php echo $_GET['id']; ?>" >

        <p>商品的名称</p>
          <input type="text" name="name" value="<?php echo $res_shop['name']; ?>" placeholder="要修改的商品">
        <p>
        <p>商品的价格</p>
          <input type="text" name="price" value="<?php echo $res_shop['price']; ?>" placeholder="航品的价格">
        <p>
        <p>商品的库存</p>
          <input type="text" name="stock" value="<?php echo $res_shop['stock']; ?>" placeholder="要修改的商品">
        <p>

        <p>商品的状态</p>
          <label >
            <input type="radio" name="shelf" value="1" <?php if($res_shop['shelf']==1){echo "checked";} ?>>上架
          </label>
          <label>
            <input type="radio" name="shelf" value="0" <?php if($res_shop['shelf']==0){echo "checked";}?>>下架
          </label>

        <p>

        <p>商品的品牌以及商品的分类</p>
          <select class="" name="brand_id">
            <?php
              foreach ($res_class as $key => $value) {
                $query_brand = "select * from brand where brand.class_id = {$value['id']}";
                $res_brand = $dao -> query($query_brand);

                //外层为分类名称
                echo "<option disabled>{$value['name']}</option>";
                foreach ($res_brand as $key1 => $value1) {
                  //内层为品牌名称

                  if($value1['id'] == $res_shop['brand_id']){
                    echo "<option selected='selected' value = '{$value1['id']}'>{$value1['name']}</option>";
                  }else{
                    echo "<option value = '{$value1['id']}'>{$value1['name']}</option>";
                  }
                }
                // code...
              }
             ?>
          </select>
        </p>
        <p>原图片</p>
          <input type="hidden" name = 'yuanImg' value = '<?php echo $res_shop['img'] ?>'>
          <img name = 'yuanImg' value = '<?php echo $res_shop['img'] ?>' width = 75px height = 75px src="../public/uploads/<?php echo $res_shop['img'] ?>" alt="">


        <p>选择图片</p>
        <p><input type="file" name="img" value=""></p>

        <p>
          <input type="submit"  value="添加">
        </p>

        </p>


      </form>
    </div>
  </body>
</html>
