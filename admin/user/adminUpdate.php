<?php

include 'public_connect_mysql.php';

$id = isset($_POST['id'])?$_POST['id']:'';
$password = isset($_POST['password'])?$_POST['password']:'';
//发送sql查询语句
$update_sql = "update user set password =  '$password' where id = $id";
//查询结果集
$update_res = $dao -> update_one($update_sql);
echo $update_res;
if($update_res){
  echo "<script>location = '../login.php'</script>";
}

 ?>
