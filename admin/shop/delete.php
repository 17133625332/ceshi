<?php
/************
  删除用户
************/
//在本页面中学习到删除带有图片的记录时必须连同图片也删除

//$file = "url"找到路径
//unlink($file)删除图片


include 'public_connect_mysql.php';

//获取点击删除的用户id
$id =  isset($_GET['id'])?$_GET['id']:'';
$img = isset($_GET['img'])?$_GET['img']:'';
$sql = "delete from shop where id = {$id}";

//调用删除单挑记录的函数

  $page = $_GET['page'];
  // echo $page;
  // exit;
$res_del = $dao -> delete_one($sql);

if($res_del){
  //找到图片的位置
  $file = "../public/uploads/{$img}";
  $file2 = "../public/uploads/thumb_{$img}";
  //删除图片
  unlink($file);
  unlink($file2);
  $page = $_GET['page'];

  echo "<script>location = 'index.php?page={$page}'</script>";
}


 ?>
