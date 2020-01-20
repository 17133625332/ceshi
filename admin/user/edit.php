
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../public/css/index.css">
  </head>
  <body>
    <div class="main">
      <form class="form" action="update.php" method="post">
        <input type="text" name="id" hidden  value="<?php echo $_GET['id']; ?>" >
        <p>用户名</p>
        <input type="text" name="username" value="<?php echo $_GET['username']; ?>" placeholder="username" readonly = "true">
        <p>密码</p>
        <input type="password" name="password" value="" placeholder="请输入你要修改的密码">
        <p>
          <input type="submit" name="" value="添加">
        </p>


      </form>
    </div>
  </body>
</html>
