<?php
/****
  添加用户逻辑控制
****/

  // echo $a + "3333";

include 'public_connect_mysql.php';

  if($_POST['username']){
    $username = $_POST['username'];
  }else{
    $username = '';
  }
  if($_POST['password']){
    $password = md5($_POST['password']);


  }else{
    $password = '';
  }

  $sql = "insert into user (username,password )values ('$username','$password') ";

  $res_insert = $dao -> insert_one($sql);
  echo $res_insert;
  if($res_insert){
    echo "<script>location = 'index.php'</script>";
  }


 ?>
