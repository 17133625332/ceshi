<?php
/****
  添加用户逻辑控制
****/
  header("content-type: text/html; charset = utf-8");

  include 'public_connect_mysql.php';

  if($_POST['id']){
    $user_id = $_POST['id'];
  }else{
    $user_id = '';
  }
  if($_POST['password']){
    $password = md5($_POST['password']);


  }else{
    $password = '';
  }

  $sql = "update user set password = '$password' where id = $user_id";

  $res_update = $dao -> update_one($sql);
  // echo $res_update;
  if($res_update){
    echo "<script>location = 'index.php'</script>";
  }


 ?>
