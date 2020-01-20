<?php
/****
  添加用户逻辑控制
****/
  header("content-type: text/html; charset = utf-8");

  include 'public_connect_mysql.php';

/*
    print_r()的用法可以将所有要显示的信息以数据的形式输出
*/


  //id为品牌序号
  if(isset($_POST['code'])){
    $code = $_POST['code'];
  }else{
    $code = '';
  }
  if(isset($_POST['status_id'])){
    $status_id = $_POST['status_id'];
  }else{
    $status_id = '';
  }

  $sql = "update indent set status_id ='$status_id' where code = '$code'";
  $res_update = $dao -> update_one($sql);
  // echo $res_update;
  if($res_update){
    echo "<script>location = 'index.php'</script>";
  }


 ?>
