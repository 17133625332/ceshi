<?php
/****
  添加用户逻辑控制
****/

  // echo $a + "3333";

include 'public_connect_mysql.php';

  if(isset($_POST['name'])){
    $name = $_POST['name'];
  }else{
    $name = '';
  }

  if(isset($_POST['id'])){
    $id= $_POST['id'];
  }else{
    $id = '';
  }


  $sql = "insert into brand (name,class_id) values ('$name','$id') ";
  $res_insert = $dao -> insert_one($sql);

  if($res_insert){
    echo "<script>location = 'index.php'</script>";
  }


 ?>
