<?php

/*
    添加购物车
*/

    include './public_connect_mysql.php';
    session_start();


    $shop_id = isset($_GET['shop_id'])?$_GET['shop_id']:'';
    $shop_sql = "select * from shop where id = $shop_id";
    $shop_res = $dao -> fetchOne($shop_sql);
    // var_dump($shop_res);
    if($shop_res['stock'] > 0){
      //商品库存不足
      //把商品放入购物车实现原理
      $_SESSION['shop'][$shop_res['id']] = $shop_res;
      $_SESSION['shop'][$shop_res['id']]['num'] = 1;
      echo "<script>location='./index.php'</script>";
    }else{
      echo "<script>alert('您购买的商品库存量不足')</script>";
      echo "<script>location='../index.php'</script>";
    }

 ?>
