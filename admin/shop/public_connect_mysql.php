<?php
  header("content-type: text/html; charset = utf-8");

  include_once '../../public/common/config.php';
  $option_arr = array(
    'host' => 'localhost',
    'user' => 'root',
    'pwd' => 'lz100105',
    'dbname' => 'shop',
    'port' => 3306,
    'charset' => 'utf8'
  );

  //创建一个对象实例
  $dao = DAOMySQLI::getSingleton($option_arr);

 ?>
