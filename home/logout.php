<?php
    //为了防止退出时将购物车也清空，此时应该将购物车的session另外赋给一个新的变量
    session_start();
    // var_dump($_SESSION);
    // exit;
    $arr = $_SESSION['shop'];
    $_SESSION = array();

    // session_destroy();   此句如果写了session全部失效

    setcookie('PHPSESSION','',time()-3600,'/');

    $_SESSION['shop'] = $arr;

    echo '<script>location="login.php"</script>';



 ?>
