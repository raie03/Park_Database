<?php
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }

  date_default_timezone_set("Asia/Tokyo");
  if (isset($_GET["parkname"]) && isset($_GET["pref"]) && isset($_GET["data"]) && isset($_GET["address"])) {
    $parkname = $_GET["parkname"];
    $pref = $_GET["pref"];
    $data = $_GET["data"];
    $address = $_GET["address"];
    
    $pdo = new PDO("sqlite:SQL\parklist.sqlite");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $st = $pdo->prepare("INSERT INTO parklist(parkname, pref, data, address) VALUES(?, ?, ?, ?)");
    $st->execute(array($parkname, $pref, $data, $address));

      $result = "登録しました。";
  }
  else {
    $result = "公園の内容がありません。";
  }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>公園登録</title>
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