<?php

  include 'public_connect_mysql.php';
  session_start();
  // print_r($_POST);
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql_user = "select id,username,password from user where username = '{$username}' and password = '{$password}'";
  echo $sql_user;
  // echo "测试一把";
  // exit;
  $res_user = $dao -> fetchOne($sql_user);

  if($res_user){
    //登录成功
    // echo "登录成功";
    // 开始记录session
    // exit;
    $_SESSION['home_userid'] = $res_user['id'];
    $_SESSION['username'] = $res_user['username'];
    // exit;
    echo "<script>location='./person/index.php'</script>";
  }else{
    //登录失败
    echo "登录失败";
  }


 ?>
