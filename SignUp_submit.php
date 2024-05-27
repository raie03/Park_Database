<?php
    session_start();

  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }

  $result = "登録できませんでした。";
  if (isset($_POST["username"]) && isset($_POST["passwd"]) && isset($_POST["passwd2"])) {

    $username = $_POST["username"];
    $passwd = $_POST["passwd"];
    $passwd2 = $_POST["passwd2"];
    
    $pdo = new PDO("sqlite:SQL\parklist.sqlite");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $st = $pdo->prepare("select * from user where username = ?");
    $st->execute(array($username));
    $user_on_db = $st->fetch();
  }
  else {
    header("Location: SignUp.php?error=1");
        exit;
  }
    
    if(empty($username))
    {
        header("Location: SignUp.php?error=3");
        exit;
    }
    else if(empty($passwd) || empty($passwd2))
    {
        header("Location: SignUp.php?error=5");
        exit;
    }
    else if ($passwd != $passwd2){
        header("Location: SignUp.php?error=2");
        exit;
    }
    
    else if ($user_on_db)
    {
        header("Location: SignUp.php?error=4");
        exit;
    }
    else if(!$user_on_db && $passwd == $passwd2) {
        $st2 = $pdo->prepare("INSERT INTO user(username, password) VALUES(?, ?)");
        $st2->execute(array($username, $passwd));

        $result = "登録しました。";
    }
    else{
        header("Location: SignUp.php?error=1");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>SignUp_submit</title>
    <link rel="stylesheet" href="ParkDataBase.css">       
  </head>
  <body>
    <div class="submitForm">
    <?php
    print '<h2>' .h($result). '</h2>';
    ?>
    <p><a href="login_form.php">ログイン画面に戻る</a></p>
    <p><a href="ParkList.php">公園一覧に戻る</a></p>
    </div>
</body>
</html>