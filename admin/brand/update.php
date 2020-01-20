<?php
/****
  添加用户逻辑控制
****/
  header("content-type: text/html; charset = utf-8");

  include 'public_connect_mysql.php';

/*
    print_r()的用法可以将所有要显示的信息以数据的形式输出
*/


  //id为品牌序号
  if(isset($_POST['id'])){
    $id = $_POST['id'];
  }else{
    $id = '';
  }
  if(isset($_POST['name'])){
    $name = $_POST['name'];
  }else{
    $name = '';
  }

  if(isset($_POST['class_id'])){
    $class_id = $_POST['class_id'];
  }else{
    $class_id = '';
  }

  $sql = "update brand set name = '$name',class_id = '$class_id' where id = '$id'";

  $res_update = $dao -> update_one($sql);
  // echo $res_update;
  if($res_update){
    echo "<script>location = 'index.php'</script>";
  }


 ?>
