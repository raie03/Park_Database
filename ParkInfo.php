<?php

  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }

  $sum=0;
  $count=0;

  $pdo = new PDO("sqlite:SQL\parklist.sqlite");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $st = $pdo->query("SELECT * FROM parklist ORDER BY id DESC");
  $data = $st->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>公園情報</title>
    <link rel="stylesheet" href="ParkDataBase.css">
    
  </head>
  <body>
    <?php
  
      foreach($data as $parklist) {
        if($parklist['id']===$_GET['id'])
        {
            $park_id=$_GET['id'];
            print 
            "<div class='parkInfo'>
            <H1 class='parkTitle'>".h($parklist["pref"])."  ".h($parklist["parkname"])." </h1>
            <div class='parkAddAndInfo'><p>住所: ".h($parklist["pref"])."".h($parklist["address"])."</p>
            <p>情報: ".h($parklist["data"])."</p>";
            //編集
            print "<p class='edit'> <a href='ParkInfo_edit.php?id=".h($parklist['id'])."&parkname=".h($parklist['parkname'])."&pref=".h($parklist['pref'])."&data=".h($parklist['data'])."&address=".h($parklist['address'])."'>編集</a> <p></div>";

            print 
            "<h2>地図</h2>
            <img src = https://maps.googleapis.com/maps/api/staticmap?center=".h($parklist["pref"])."".h($parklist["address"]).",CA&zoom=16&size=400x400&scale=2&key=myapikey class='image'></img>";
        
            $st = $pdo->query("SELECT * FROM review WHERE park_id = '$parklist[id]' ORDER BY id DESC");
            $data2 = $st->fetchAll();
            print "<div class='review'><h2>レビュー</h2>";
            foreach($data2 as $review) {
              $sum = $sum + h($review["rate"]);
              $count = $count + 1;
              print '<div class="reviewAndComment"><p>'. h($review["name"]) . '</p>';
              print '<span class="star5_rating" data-rate="' . h($review["rate"]).'"></span>';
              print '<p class="comment">'. h($review["body"]) . '</p>';
              print '<br></div>';
            }
            if($sum!=0 && $count !=0)print '<h3>平均：★' . round($sum/$count,1) . '</h3>';

            //レビュー
            print '<p class="reviewLink"><a href="review.php?park_id=' .h($parklist['id']). '">レビュー投稿</a></p></div>';

        }
    
        }
        
    ?>

    <p><a href="ParkList.php">公園一覧に戻る</a></p></div>
  </body>
</html>
