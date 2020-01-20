<?php
  include 'public_connect_mysql.php';
  // print_r($_GET);
  // echo "<pre>";
  // print_r($_GET);
  // echo "</pre>";
  // echo "<pre>";
  // print_r($_FILES);
  // echo "</pre>";

  isset($_GET['id'])?$id=$_GET['id']:$id='';
  $query_shop = "select * from advert where id = {$id}";
  //获取要修改广告的所有信息
  $res_advert = $dao -> fetchOne($query_shop);

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

        <p>位置</p>
        <p>
          <select class="" name="pos">
            <option value="0" <?php if($res_advert['pos'] == 0) {
              echo "selected";
            } ?>>0</option>
            <option value="1" <?php if($res_advert['pos'] == 1) {
              echo "selected";
            } ?>>1</option>
          </select>
        </p>


        <p>原图片</p>
          <input type="hidden" name = 'yuanImg' value = '<?php echo $res_advert['img'] ?>'>
          <img name = 'yuanImg' value = '<?php echo $res_advert['img'] ?>' width = 75px height = 75px src="../public/uploads/<?php echo $res_advert['img'] ?>" alt="">


          <p>选择图片</p>
          <p><input type="file" name="img" value=""></p>
          <p>Url</p>
          <p><input type="text" name="url"  value = "<?php echo $res_advert['url']; ?>" ><?php  ?></p>


          <p>
            <input type="submit"  value="添加">
          </p>

        </p>


      </form>
    </div>
  </body>
</html>
