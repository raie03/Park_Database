<?php
  session_start();

  $_SESSION = array();
  session_destroy();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login success</title>
    <link rel="stylesheet" href="ParkDataBase.css">
  </head>
  <body>
    <div class="submitForm">
      <h2>ログアウトしました</h2>
      <p><a href="ParkList.php">公園一覧に戻る</a></p>
    </div>
  </body>
</html>
