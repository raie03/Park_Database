<?php
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }

  if (isset($_GET["id"]) && isset($_GET["parkname"]) && isset($_GET["pref"]) && isset($_GET["data"]) && isset($_GET["address"])) {
    $id = $_GET["id"];
    $parkname = $_GET["parkname"];
    $pref = $_GET["pref"];
    $data = $_GET["data"];
    $address = $_GET["address"];
    
    $pdo = new PDO("sqlite:SQL\parklist.sqlite");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $st = $pdo->prepare("UPDATE parklist set parkname=?, pref=?, data=?, address=? WHERE id=".$id."");
    $st->execute(array($parkname, $pref, $data, $address));

      $result = "変更しました。";
  }
  else {
    $result = "公園の内容がありません。";
  }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>公園情報編集</title>
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