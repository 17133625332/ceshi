<?php

session_start();
$shop_id = isset($_GET['id'])?$_GET['id']:'';



if($_SESSION['shop'][$shop_id]['num'] <= 1){
  $_SESSION['shop'][$shop_id]['num'] == 1;
}else{
  $_SESSION['shop'][$shop_id]['num']--;
}
echo "<script>location='./index.php'</script>";


 ?>
