<?php
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }

  if (isset($_GET["park_id"]) && isset($_GET["name"]) && isset($_GET["rate"]) && isset($_GET["body"])) {

    $park_id = $_GET["park_id"];
    $name = $_GET["name"];
    $rate = $_GET["rate"];  
    $body = $_GET["body"];
    
    $pdo = new PDO("sqlite:SQL\parklist.sqlite");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $st = $pdo->prepare("INSERT INTO review(park_id, name, rate, body) VALUES(?, ?, ?, ?)");
    $st->execute(array($park_id, $name, $rate, $body));

      $result = "登録しました。";
  }
  else {
    $result = "レビューの内容がありません。";
  }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>レビュー登録</title>
    <link rel="stylesheet" href="ParkDataBase.css">        
  </head>
  <body>

  <div class="submitForm">
    <?php
    print '<h2>' .h($result). '</h2>';
    ?>
    <p>
      <a href="ParkList.php">公園一覧に戻る</a>
    </p>
    </div>
    
  </body>
</html>
