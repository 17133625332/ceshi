<?php
/****
  添加用户逻辑控制
****/

  // echo $a + "3333";

include 'public_connect_mysql.php';
/*
  下面这几句用于输出通过post传过来的值或者file传过来的属性
*/
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";
// exit;


isset($_POST['pos'])?$pos=$_POST['pos']:$pos='';
isset($_POST['url'])?$url=$_POST['url']:$url='';


//图片上传
$src = $_FILES['img']['tmp_name'];
$name = $_FILES['img']['name'];

$name_arr = explode('.',$name);
$ext = array_pop($name_arr);
// $ext = array_pop(explode(".",$name));  会提示错误
// var_dump(getimagesize($_FILES['img']['size']));

$dst = '../public/uploads/'.time().mt_rand().'.'.$ext;
if(move_uploaded_file($src,$dst)){
  include './img_fun.php';
  //进行图片缩放200*200
  thumb($dst,200,200);
  //将图片的名字保存到$img中
  $img = basename($dst);


}
// if(move_uploaded_file($src,$dst)){
//   //进行图片缩放
//   echo '上传成功';
// }else{
//   echo "上传失败";
// }




  $sql = "insert into advert (pos,img,url) values ('$pos','$img','$url')";
  $res_insert = $dao -> insert_one($sql);

  if($res_insert){
    echo "<script>location = 'index.php'</script>";
  }


 ?>
