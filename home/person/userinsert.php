<?php

  include './public_connect_mysql.php';
  session_start();
  // var_dump($_POST);    查看通过post传过来胡内容
  //接收名字
  if(isset($_POST['name'])){

    $name = $_POST['name'];
  }else{
    $name = '';
  }

  //接收地址
  if(isset($_POST['addr'])){

    $addr = $_POST['addr'];
  }else{
    $addr = '';
  }

  //接收联系方式
  if(isset($_POST['tel'])){

    $tel = $_POST['tel'];
  }else{
    $tel = '';
  }


  //接收邮箱
  if(isset($_POST['email'])){

    $email = $_POST['email'];
  }else{
    $email = '';
  }

  $user_id = $_SESSION['home_userid'];
  // echo $user_id;
  $insert_sql = "insert into touch (name,addr,tel,email,user_id) values ('$name','$addr','$tel','$email','$user_id')";
  $insert_res = $dao -> insert_one($insert_sql);

  if($insert_res){
    echo "<script>location='useradd.php'</script>";
  }else{
    echo '插入失败';
  }


 ?>
