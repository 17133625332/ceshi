<?php
  //进行验证是否登陆合法

  //打开session用于存储登陆信息
  session_start();

  include './public_connect_mysql.php';

  $username = isset($_POST['username'])?$_POST['username']:'';
  $password = md5(isset($_POST['password'])?$_POST['password']:'');

  $sql = "select * from user where username = '{$username}' and password = '{$password}' and  isadmin = 1";
  $res = $dao -> fetchOne($sql);

  if($res){
    //用于各个模块进行是否合法登陆
    //登陆成功
    $_SESSION['admin_username'] = $res['username'];
    $_SESSION['admin_userid'] = $res['id'];
    echo "<script>location='index.php'</script>";
  }else{
    echo "<script>alert('用户名或密码有误!')</script>";
    echo "<script>location='login.php'</script>";
  }


 ?>
