<?php
/*
    确认收货
*/
  include './public_connect_mysql.php';

  isset($_GET['code'])?$code=$_GET['code']:$code='';

  $update_config = "update indent set confirm = 1 where code = '$code'";
  $res_config = $dao -> update_one($update_config);

  echo "<script>location='userlist.php'</script>";


 ?>
