<?php

  include 'public_connect_mysql.php';
  session_start();
  //生成订单号
  $code = time().mt_rand();
  //用户id
  $user_id = $_SESSION['home_userid'];
  //时间

  //联系方式id
  $touch_id = $_POST['touch_id'];
// var_dump($_SESSION['shop']);
// exit;
  foreach ($_SESSION['shop'] as $key => $value) {
    // var_dump($value);
    $time = time();
    // $sql = "insert into indent (code,user_id,time,touch_id,shop_id,price,num) values ('$code','$user_id','$time',$touch_id,'{$value['id']}',{$value['price']},{$value['num']})";
    // $dao -> insert_one($sql);

    //减少库存
    $delete_stock = $value['stock'] - $value['num'];
    $sql_delete = "update shop set stock = {$delete_stock} where id = {$value['id']}";
    echo $sql_delete;
    $res = $dao -> update_one($sql_delete);
    // echo $res;
    // var_dump($value);
    // exit;

  }
  //清空购物车
  $_SESSION['shop'] = array();
  
  //提交订单后库存减少但是购物车清了
  echo "<script>alert('您的订单号为:{$code}')</script>";
  echo "<script>location='../person/orderlist.php'</script>";
  print_r($_POST);

 ?>
