<?php
    session_start();

    $h2 = "アカウントを作成";
    if(isset($_GET["error"]))
    {
        $error = $_GET["error"];
        if($error == 1)
        {
            $h2 = "ユーザ名もしくはパスワードの記入がありません。";
        }
        else if($error == 2)
        {
            $h2 = "パスワードが一致していません。";
        }
        else if($error == 3)
        {
            $h2 = "ユーザ名が未記入です。";
        }
        else if($error == 4)
        {
            $h2 = "既に登録されているユーザ名です。";
        }
        else if($error == 5)
        {
            $h2 = "パスワードの記入がありません。";
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link rel="stylesheet" href="ParkDataBase.css">
  </head>
  <body>
    
    <div class="Form">
    <h2><?php print $h2;?></h2>
    <form action="SignUp_submit.php" method="post">
    <input type="text" name="username" placeholder="ユーザ名" class="textbox"><br>
    <input type="password" name="passwd" placeholder="パスワード"class="textbox"><br>
    <input type="password" name="passwd2" placeholder="パスワード(確認)" class="textbox"><br>
    <input type=submit value="登録" class="button">
    </form>
    <p><a href="ParkList.php">公園一覧に戻る</a></p>
    </div>
  </body>
</html>