
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>分类页面</title>
    <link rel="stylesheet" href="public/css/index.css">
  </head>
  <body>
    <div class="login_main">
<!-- 头部 -->
      <?php
        include 'header0.php';
       ?>
<!-- 分割线 -->
       <div class="nav">

       </div>
<!-- 内容 -->
       <div class="login_content" >
         <div class="login_left">

         </div>

         <div class="login_right">
           <div class="login_form">
             <form class="" action="reg_control.php" method="post">
               <p>用户名</p>
               <p><input type="text" name="username" value="" placeholder="Username"></p>
               <p>密码</p>
               <p><input type="password" name="password" value="" placeholder="password"></p>
               <p>确认密码</p>
               <p><input type="password" name="repassword" value="" placeholder="password"></p>
               <p>验证码</p>
               <!-- 验证码验证 -->
               <p><img id="img" border="1" src="./code.php" width="150" height="50"></p>
               <a href="./reg.php">看不清？换一个</a>
               <p>请输入图片中的验证码</p>
               <p><input type="text" name="session" value=""/></p>

               <input type="submit" name="" value="提交">

             </form>
           </div>
         </div>
       </div>

       <div class="useradd_clear">
       </div>

       <div class="nav">
       </div>
     </div>
     <div class="index_clear">

     </div>
<!-- 底部 -->
    <?php
      include 'footer.php';
     ?>

  </body>
</html>
