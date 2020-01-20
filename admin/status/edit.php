
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

        <p>修改后的类名</p>
        <input type="text" name="name" value="" placeholder="请输入您要修改状态">
        <p>
          <input type="submit" name="" value="添加">
        </p>


      </form>
    </div>
  </body>
</html>
