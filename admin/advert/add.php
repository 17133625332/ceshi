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
        <p>位置</p>
        <p>
          <select class="" name="pos">
            <option value="0">0</option>
            <option value="1">1</option>
          </select>
        </p>

        <p>选择图片</p>
        <p>  <input type="file" name="img" value=""></p>

        <p>url</p>
        <p>  <input type="text" name="url" value=""></p>
        <p>
          <input type="submit"  value="添加">
        </p>
      </form>
    </div>
  </body>
</html>
