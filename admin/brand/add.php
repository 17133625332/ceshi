<?php
  include 'public_connect_mysql.php';

  $query_sql = "select id,name from class";

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
      <form class="form" action="insert.php" method="post">
        <p>用户名</p>
        <input type="text" name="name" value="" placeholder="添加类别">

        <p>
        <p>选择类别</p>
        <select class="" name="id" >
          <?php


            foreach ($query_res as $key => $value) {

              $id = $value['id'];
              echo "<option value = '{$id}'>{$value['name']}</option>";
            }

           ?>
        </select>

        <p>
          <input type="submit" name="" value="添加">
        </p>


      </form>
    </div>
  </body>
</html>
