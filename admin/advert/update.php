<?php
/****
  添加用户逻辑控制
****/
  header("content-type: text/html; charset = utf-8");

  include 'public_connect_mysql.php';

/*
    print_r()的用法可以将所有要显示的信息以数据的形式输出
*/
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";
// exit;
  isset($_POST['id'])?$id=$_POST['id']:$id='';
  isset($_POST['pos'])?$pos=$_POST['pos']:$pos='';
  isset($_POST['url'])?$url=$_POST['url']:$url='';
  isset($_POST['yuanImg'])?$yuanImg=$_POST['yuanImg']:$yuanImg='';


  $imgerror = $_FILES['img']['error'];

  if($imgerror == 0){
    //修修改图片
        //图片上传
      $src = $_FILES['img']['tmp_name'];
      $name = $_FILES['img']['name'];
      $name_arr = explode('.',$name);
      $ext = array_pop($name_arr);

      // $ext = array_pop(explode(".",$name));  会提示错误
      // var_dump(getimagesize($_FILES['img']['size']));

      $dst = '../public/uploads/'.time().mt_rand().'.'.$ext;

      if(move_uploaded_file($src,$dst)){

        include './img_fun.php';
        //进行图片缩放200*200

        thumb($dst,200,200);
        $img = basename($dst);
        //删除原图片

        $oldImg = "../public/uploads/{$yuanImg}";
        $oldImg2 = "../public/uploads/thumb_{$yuanImg}";
    

        unlink($oldImg);
        unlink($oldImg2);

        //将图片的名字保存到$img中


      }
    $sql = "update advert set pos = '{$pos}',url = '{$url}',img = '{$img}' where id = '{$id}'";
    $res_insert = $dao -> insert_one($sql);

    if($res_insert){

      echo "<script>location = 'index.php'</script>";
    }
  }else{
    //未修改图片
    $sql = "update advert set pos = '{$pos}',url = '{$url}' where id = '{$id}'";
    $update_res = $dao -> update_one($sql);

    if($update_res){
      echo "<script>location = 'index.php'</script>";
    }

  }


 ?>
