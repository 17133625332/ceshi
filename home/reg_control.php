<?php
/*
* 该页面用于对用户注册验证

*
*
*/
include './public_connect_mysql.php';
header ( 'content-Type: text/html; charset=utf-8' );
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$code = $_POST['session'];
// print_r($_POST);
// exit;

if(isset($_POST['session'])){

  //使用strtolower()将字符串全部转换成小写
  if(strtolower($code)==strtolower($_SESSION['session'])){
    // echo'<font color="#0000CC">注册成功</form>';
    if($password == $repassword){
      //密码正确 则注册密码
      $password = md5($password);
      $insert_user = "insert into user (username,password) values ('$username','$password')";

      $res = $dao -> last_id($insert_user);

      if($res){
        //注册成功

        echo "<script>location='./login.php'</script>";
      }else{
        //祖册失败
        echo '<font color="#CC0000"><b>注册失败</b></font>';
        exit;
        echo "<script>location='./reg.php'</script>";
      }
    }else{
      //密码不相同错误 跳转到注册界面重新输入信息
        echo '<font color="#CC0000"><b>密码不匹配</b></font>';
        exit;
        echo "<script>location='./reg.php'</script>";

    }

  }else{
    echo '<font color="#CC0000"><b>验证码注册错误</b></font>';
    exit;
    echo "<script>location='./reg.php'</script>";
  }
  echo $_POST['session'];
  echo $_SESSION['session'];
  exit();
}

 ?>
