<?php
  include './public_connect_mysql.php';

  if(isset($_GET['id'])){
    $id  = $_GET['id'];
  }else{
    $id = '';
  }

  $touch_sql = "select * from touch where id = {$id}";
  $touch_res = $dao -> fetchOne($touch_sql);




 ?>



 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>分类页面</title>
     <link rel="stylesheet" href="../public/css/index.css">
   </head>
   <body>
     <div class="main">
 <!-- 头部 -->
       <?php
         include '../header.php';
        ?>
 <!-- 分割线 -->
        <div class="nav">

        </div>
 <!-- 内容 -->
        <div class="content" >
 <!-- 购物车 -->
          <div class="floor">
              <div class="floor_header">
                <div class="floor_header_left">
                  <span><a href="./index.php">个人中心</a></span>
                </div>

              </div>
              <div class="floor_bottom3">
                <div class="floor_bottom3_left">
                  <ul class = "floor_bottom3_left_ul">
                    <li><a href="./orderlist.php"><span>查看联系方式</span></a></li>
                    <li><a href="./useradd.php"><span>添加联系方式</span></a></li>
                    <li><a href="./userlist.php"><span>查看订单</span></a></li>
                  </ul>
                </div>

                <div class="floor_bottom4_right">
                  <!-- <div class="floor_bottom4_right_img">
 aaa
                  </div> -->
                  <div class="floor_bottom4_right_content">
                    <form class="" action="userupdate.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $touch_res['id']; ?>">
                      <p>姓名</p>
                      <input type="text" name="name" value="<?php echo $touch_res['name']; ?>" placeholder="姓名">
                      <p>地址</p>
                      <input type="text" name="addr" value="<?php echo $touch_res['addr']; ?>" placeholder="地址">
                      <p>电话</p>
                      <input type="text" name="tel" value="<?php echo $touch_res['tel']; ?>" placeholder="电话">
                      <p>邮箱</p>
                      <input type="text" name="email" value="<?php echo $touch_res['email']; ?>" placeholder="邮箱"><br /><br />
                      <input type="submit" name="" value="提交">
                    </form>
                  </div>
                </div>

              </div>
          </div>
        </div>
        <div class="useradd_clear">

        </div>
 <!-- 底部 -->
     <?php
       include '../footer.php';
      ?>

   </body>
 </html>
