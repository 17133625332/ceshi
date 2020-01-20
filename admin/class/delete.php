<?php
/************
  删除用户
************/

include 'public_connect_mysql.php';

//获取点击删除的用户id
$id =  isset($_GET['id'])?$_GET['id']:'';

$sql = "delete from class where id = $id";

//调用删除单挑记录的函数
$res_del = $dao -> delete_one($sql);
echo $res_del;
if($res_del){

  $page = $_GET['page'];
  echo "<script>location = 'index.php?page=$page'</script>";
}


 ?>
