<?php
  session_start();

  if (isset($_GET["username"]) && isset($_GET["passwd"])) {
    $username = $_GET["username"];
    $passwd = $_GET["passwd"];

    $pdo = new PDO("sqlite:SQL\parklist.sqlite");
    $st = $pdo->prepare("select * from user where username = ?");
    $st->execute(array($username));
    $user_on_db = $st->fetch();
  }

  if (!$user_on_db) {
    $result = "指定されたユーザが存在しません。";
    }
    else if ($passwd == $user_on_db["password"])
    {
    $_SESSION["user"] = $username;
    $result = "ようこそ" . $username . "さん。<br>ログインに成功しました。";
    }
    else {
    $result = "パスワードが違います。";
    }
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
      <h2><?php print $result; ?></h2>
      <p><a href="ParkList.php">公園一覧に戻る</a></p>
    </div>
  </body>
</html>
