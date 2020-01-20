<?php

  session_start();
  $shop_id = isset($_GET['id'])?$_GET['id']:'';


  if($_SESSION['shop'][$shop_id]['num'] < $_SESSION['shop'][$shop_id]['stock']){
    $_SESSION['shop'][$shop_id]['num']++;
  }else{
    $_SESSION['shop'][$shop_id]['num'] = $_SESSION['shop'][$shop_id]['stock'];
  }
  
  echo "<script>location='./index.php'</script>";

 ?>
