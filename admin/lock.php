<?php
/*
*该文件用于验证是否合法访问
*分别在其它页面中引用
*/

session_start();

if(!$_SESSION['admin_userid']){
  echo "<script>location='/shop/admin/login.php'</script>";
}



 ?>
