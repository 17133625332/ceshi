<?php
/****
  添加用户逻辑控制
****/

  // echo $a + "3333";

include 'public_connect_mysql.php';

  if($_POST['name']){
    $name = $_POST['name'];
  }else{
    $name = '';
  }


  $sql = "insert into status (name) values ('$name') ";

  $res_insert = $dao -> insert_one($sql);

  if($res_insert){
    echo "<script>location = 'index.php'</script>";
  }


 ?>
