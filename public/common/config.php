<?php
    //DAOMySQLI。class.php

    //完成对mysql数据库的操作

    //开发类
    //1.定义类名
    //2.定义成员属性
    //3.定义成员方法
    //定义durl方法增删改差

    final class DAOMySQLI{

        //将成员属性以_开头时一种命名风格，老外比较喜欢
        //主机名
        private $_host;
        private $_user;
        private $_pwd;
        private $_dbname;
        private $_port;
        private $_charset;

        //应为我们要做成单例
        //$_instance: 表示DaoMySQLI的一个对对象实例
        private static $_instance;

        //有一个连接对象
        private $_mySQLi;

        //定义构造方法
        //option： 选项
        private function __construct(array $option){
// var_dump($option);
// exit;
          //验证数据
          $this -> _host = isset($option['host'])?$option['host']:'';
          $this -> _user = isset($option['user'])?$option['user']:'';
          // $this -> _pwd = isset($option['pwd'])?$option['pwd']:'';
          $this -> _dbname = isset($option['dbname'])?$option['dbname']:'';
          $this -> _port = isset($option['port'])?$option['port']:'';
          $this -> _charset = isset($option['charset'])?$option['charset']:'';

          if($this -> _host == '' || $this -> _user == '' || $this -> _dbname == ''
            || $this -> _port == '' || $this -> _charset == ''
          ){
            die('参数传入有误!');
          }

          //初始化我们的_mySQLi
          $this -> _mySQLi = new MySQLI($this -> _host, $this -> _user, $this -> _pwd, $this -> _dbname, $this -> _port);

          //判断连接状态
          if($this -> _mySQLi -> connect_errno){
            //
            die('连接失败，错误信息的时候'. $this -> _mySQLi ->connect_error);
          }

          //设置字符集
          $this -> _mySQLi -> set_charset($this -> _charset);
          // echo "<pre> __construct";
          // var_dump($this -> _mySQLi);
        }



        //定义一个静态方法getSingleton。。
        public static function getSingleton(array $option){

          //判断是前面的对象是否是后面类的实例
          //instance判断某个对象是否为某个类的实例或者判断某个对象是否实现了某个接口
          if(!self::$_instance instanceof self){
            //创建一个对象
            self::$_instance = new self($option);
          }

          return self::$_instance;
        }


        //防止克隆
        private function __clone(){}

        // 编写一个方法用于统计查询的记录
        public function total($total){

          $res =  $this-> _mySQLi -> query($total);
          // $total = $res -> fetch_array;

          //统计共有多少条sql记录

          return $res -> num_rows;

        }
        //编写一个方法，完成对数据表的查询
        public function query($sql){
          //成功返回结果集 失败返回false

          //顶一个空数组[封装数据]
          $arr = array();

          if($res = $this -> _mySQLi -> query($sql)){

            //成功把$res对象返回给调用者
            //问题1  一般情况下，我们程序员希望将$res对象尽快释放
            //解决思路：
            //（1）$res == 数据 ===> $array
            //（2）释放$res
            //（3）返回数组
              while($row = $res -> fetch_assoc()){

                $arr[] = $row;
              }
              //释放资源
              $res -> free();
              //返回数组
              return $arr;
            }else{
            //失败
            echo "<br />执行失败sql语句是".$sql;
            echo "<br />失败的原因是".$this -> $_mySQLi ->error;
            exit;
            }
          }



            //编写一个方法，完成的对表的dml操作
            public function insert_one($insert_sql){

              // $insert_sql = "insert into user  (username,password) values ('123456','1')";

              $res1  = $this ->  _mySQLi -> query($insert_sql);
              if($res1){
                //
              return 1;
              }else{
                //
                return 0;
              }

            }

            //编写一个方法，完成对表的dml中删除操作
            public function delete_one($delete_sql){

              $res = $this -> _mySQLi ->query($delete_sql);
              if($res){

                //删除成功
                return 1;
              }else{
                return 0;
              }
            }

            //作业的评价
            //获取一条记录的成员方法
            public function fetchOne($sql){

              if($res = $this -> _mySQLi ->query($sql)){

                //取出这条记录
                if($row = $res -> fetch_assoc()){

                  return $row;
                }else{

                  // echo "取出失败".$this -> _mySQLi -> error;
                  return 0;
                }
              }else{
                //失败
                echo "<br />执行失败sql语句是".$sql;
                echo "<br  />失败的原因是".$this -> _mySQLi ->error;
                return 0;
              }
            }

            //编写一个方法，修改单挑记录
            public function update_one($update_sql){

                $res = $this -> _mySQLi -> query($update_sql);
                if($res){
                  return 1;
                }else{
                  return 0;
// c4ca4238a0b923820dcc509a6f75849b
                }
            }

            //获取最后一次插入记录的id
            public function last_id($insert_sql){

              $res1  = $this ->  _mySQLi -> query($insert_sql);
              if($res1){
                $last_id = $this -> _mySQLi-> insert_id;
                return $last_id;
              }else{
                //
                return 0;
              }
            }



    }

 ?>
