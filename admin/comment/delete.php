<?php
  include './public_connect_mysql.php';

  $id = $_GET['id'];

  $sql = "delete from comment where id = {$id}";
  // echo $sql;
  $res = $dao -> delete_one($sql);
  if($res){
    echo "<script>location='index.php'</script>";
  }


 ?>
