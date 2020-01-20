<?php

    include 'public_connect_mysql.php';

    print_r($_GET);
    $order_id = isset($_GET['id'])?$_GET['id']:'';

    $order_delete_sql = "delete from touch where id = {$order_id}";
    $order_delete_res = $dao -> delete_one($order_delete_sql);

    if($order_delete_res){
      //成功则跳转到相应胡界面
      echo "<script>location='./orderlist.php'</script>";
    }else{
      //失败则暂停
    }

 ?>
