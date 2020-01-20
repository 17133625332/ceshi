<?php

  session_start();
  include './public_connect_mysql.php';
  // var_dump($_SESSION);
  if(!isset($_SESSION['home_userid'])){
    echo "<script>location='../login.php'</script>";
  }else{

  }

  $touch_sql = "select * from touch where user_id = {$_SESSION['home_userid']}";
  $touch_res = $dao -> query($touch_sql);

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
                 <span><a href="">我的购物车</a> </span>
               </div>

             </div>
             <div class="floor_bottom2">
               <table border = 1px width = 100% >
                 <tr align = "center">
                   <td>商品</td>
                   <td>图片</td>
                   <td>价格</td>
                   <td>库存</td>
                   <td>数量</td>
                   <td>合计</td>
                   <td>删除</td>
                 </tr>
                 <?php $total_price = 0; ?>
                 <!-- 如果没有添加购物车提示请先购买 -->
                 <?php foreach ($_SESSION['shop'] = isset($_SESSION['shop'])?$_SESSION['shop']:array() as $key => $value): ?>
<!-- 计算总金额 -->
                   <?php
                        $total_price = $total_price + $value['price']*$value['num'];
                    ?>
                   <tr align = "center">
                     <td><?php echo $value['name']; ?></td>
                     <td> <img src="../../admin/public/uploads/thumb_<?php echo $value['img'];  ?>" alt=""></td>
                     <td><?php echo $value['price']; ?></td>
                     <td><?php echo $value['stock']; ?></td>
                     <td class = "cat_num_td" >
                       <a href="./cut.php?id=<?php echo $value['id']; ?>" class="car_num"> - </a>
                       <span>  <?php echo $value['num']; ?>  </span>
                       <a href="./add.php?id=<?php echo $value['id']; ?>" class="car_num"> + </a>
                     </td>
                     <td><?php echo $value['price']*$value['num']; ?></td>
                     <td><a href="./delete.php?cat_id=<?php echo $value['id']; ?>" class = "car_del">删除</a></td>
                   </tr>
                 <?php endforeach; ?>

                   <tr height = 50px align="center" style="margin:10px;">
                      <td colspan = 2 > <a href="../index.php" class = "car_del" >继续购物</a></td>
                        <!-- <td>&nbsp;</td> -->
                      <td colspan = 3>   <a href="clear.php" class = "car_del"> 清空购物</a></td>
                      <td>总合计：</td>
                      <td><?php echo $total_price; ?></td>
                   </tr>

               </table>
             </div>
         </div>



<!-- 我的联系方式 -->
      <div class="floor">
          <div class="floor_header">
      <div class="floor_header_left">
        <span><a href="">我的联系方式</a> </span>
      </div>

    </div>

<!-- 判断是否登录成功 -->

      <div class="floor_bottom2">
      <?php
          if(isset($_SESSION['home_userid'])){
       ?>
<!-- 一般table表单放在form表单内部，否者有的浏览器可能会抱错 -->
       <form class="" action="commit.php" method="post">
         <table  width = 100%  class = "touch">
          <!--  -->
            <tr align = "center">
              <td>选择</td>
              <td>姓名</td>
              <td>地址</td>
              <td>电话</td>
              <td>邮箱</td>
            </tr>
          <?php $i = 0; ?>
          <?php foreach ($touch_res as $key => $value1): ?>
            <tr align = "center">
              <td>
                <input type="radio" name="touch_id" value = "<?php echo $value1['id']; ?>" <?php if($i == 0){
                  echo "checked";
                } ?>>
              </td>
              <td> <?php echo $value1['name']; ?> </td>
              <td> <?php echo $value1['addr']; ?> </td>
              <td> <?php echo $value1['tel']; ?> </td>
              <td >
                <?php echo $value1['email']; ?>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </table>


      <?php
         }else{
          echo '请您先登陆,请先登陆<a href = "../login.php">登录</a><br/>';
        }
       ?>
    </div>
        </div>

      </div>


    <div class="floor_bottom2">
      <p>
        <?php if(isset($value)){
            echo "<input style='height:50px; color:red;background:pink;border-radius:10px;' class = 'commit' type='submit' name='''  value='提交订单' >";
        } ?>
      </p>
       </form>
    </div>
          </div>

        </div>


<!-- 分割线 -->
       <div class="nav">

       </div>
<!-- 底部 -->
      <?php
        include '../footer.php';
       ?>

    </div>

  </body>
</html>
