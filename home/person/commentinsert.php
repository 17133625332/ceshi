<?php
  include './public_connect_mysql.php';
  session_start();

  print_r($_POST);
  $content = $_POST['content'];
  $user_id = $_SESSION['home_userid'];
  $shop_id = $_POST['shop_id'];
  $time = time();

  $sql = "insert into comment (user_id,content,shop_id,time) values ('$user_id','$content','$shop_id','$time')";
// echo $sql;
  $res = $dao -> insert_one($sql);
  // echo $res;

   echo "<script>location='../index.php'</script>";
  // echo "<script>location='../shop.php'<script>";
 ?>
