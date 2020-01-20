<?php
  include 'public_connect_mysql.php';

  $status_id = isset($_GET['status_id'])?$_GET['status_id']:'';
  $code = isset($_GET['code'])?$_GET['code']:'';

  $query_status = "select name,id from status";
  $res_status = $dao -> query($query_status);


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
      <form class="form" action="update.php" method="post">

        <p>订单号</p>
        <p><input type="text" name="code" readonly value="<?php echo $code; ?>" placeholder="要修改的订单号"></p>
        <p>状态修改</p>
        <p>
          <select class="" name="status_id">
            <?php
              foreach ($res_status as $key => $value) {

                if($status_id == $value['id']){

                  echo "<option value = {$value['id']} selected='selected'>{$value['name']}</option>";
                }else{
                  echo "<option value = {$value['id']} >{$value['name']}</option>";
                }


              }
             ?>

          </select>
        </p>
        <p>
          <input type="submit" name="" value="修改">
        </p>


      </form>
    </div>
  </body>
</html>
