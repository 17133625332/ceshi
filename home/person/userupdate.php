<?php
  include './public_connect_mysql.php';

  var_dump($_POST);
  isset($_POST['id'])?$id = $_POST['id']:$id = '';
  isset($_POST['name'])?$name = $_POST['name']:$name = '';
  isset($_POST['addr'])?$addr = $_POST['addr']:$addr = '';
  isset($_POST['tel'])?$tel = $_POST['tel']:$tel = '';
  isset($_POST['email'])?$email = $_POST['email']:$email = '';

  $update_sql = "update touch set name = '{$name}',addr = '{$addr}',tel = '{$tel}',email = '{$email}' where id = $id";
  $update_res = $dao -> update_one($update_sql);
  if($update_res){
    echo "<script>location='orderlist.php'</script>";
  }else{
    echo "修改失败";
  }




 ?>
