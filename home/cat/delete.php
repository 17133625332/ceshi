<?php
//删除购物车里面的内容
    include './public_connect_mysql.php';

    session_start();

    $cat_id = isset($_GET['cat_id'])?$_GET['cat_id']:'';

    unset($_SESSION['shop'][$cat_id]);


    echo "<script>location='index.php'</script>";


 ?>
