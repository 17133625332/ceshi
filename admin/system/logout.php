<?php
  session_start();
// PHP退出登陆需要三步骤：

// 1、清空session
  $_SESSION=array();

// 2、销毁客户端设置的cookie
  setCookie("PHPSESSID","",time()-1,"/");

  session_destroy();

  echo "<script>location ='http://localhost/shop/admin/system/demo.php'</script>";



 ?>
