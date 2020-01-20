<?php
  include 'public_connect_mysql.php';
  $query_sql = "select id,name from class";
  $query_res = $dao->query($query_sql);
  $class_id = $_GET['class_id'];


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
        <input type="text" name="id" hidden  value="<?php echo $_GET['id']; ?>" >

        <p>修改后的类名</p>
        <input type="text" name="name" value="<?php echo $_GET['name']; ?>" placeholder="要修改的品牌">
        <p>
          <select class="" name="class_id">
            <?php
              foreach ($query_res as $key => $value) {
                $id = $value['id'];
                if($id == $class_id){

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
