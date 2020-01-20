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
  if($_POST['name']){
    $name = $_POST['name'];
  }else{
    $name = '';
  }

  $sql = "update class set name = '$name' where id = $user_id";

  $res_update = $dao -> update_one($sql);
  // echo $res_update;
  if($res_update){
    echo "<script>location = 'index.php'</script>";
  }


 ?>
