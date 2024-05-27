<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Login form</title>
    <link rel="stylesheet" href="ParkDataBase.css">
  </head>
  <body>
    
    <div class="Form">
    <h2>ログイン</h2>
    <form action="login_submit.php" method="get">
    <input type="text" name="username" placeholder="ユーザ名" class="textbox"><br>
    <input type="password" name="passwd" placeholder="パスワード" class="textbox"><br>
    <input type=submit value="ログイン" class=button>
    </form>
    <p><a href="SignUp.php">サインアップ</a></p>
    <p><a href="ParkList.php">公園一覧に戻る</a></p>
    </div>
    
  </body>
</html>
