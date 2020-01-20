<?php

    session_start();
    //清空购物车
    // var_dump($_SESSION);
    $_SESSION['shop'] = array();
    // var_dump($_SESSION);
    // unset($_SESSION);


    echo "<script>location='index.php'</script>"


 ?>
