<?php

  //$total_num为总条数
  //$divide_sql为将分业的纪录

  function dividePages($total_num,$divide_sql){
  include '../comment/public_connect_mysql.php';
      //设置每页显示的数量
      $page_size = 3;

      //解析结果集资源 -- 记录总数
      // $total_sql2 = "select count(*) as num from class";

      // echo $total_num;
      // echo "<br />";
      // echo $divide_sql;
      // exit;

      //计算最大页码，ceil向上取整
      $totalpage = ceil($total_num/$page_size);

      $page = isset($_GET['page'])?$_GET['page']:1;

      //计算偏移量
      $offset = ($page-1)*$page_size;
      $sql = "$divide_sql limit {$offset},{$page_size}";
      $result = $dao -> query($sql);

      $rows = array();
      foreach ($result as $key => $value) {
        // code...
        $rows[] = $value;


        $_SESSION['page'] = $page;
        $_SESSION['totalpage'] = $totalpage;

      }

      return $rows;
  }


 ?>
