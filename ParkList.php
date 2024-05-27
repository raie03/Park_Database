<?php
    session_start();

    function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8"><title>公園一覧</title>
        <link rel="stylesheet" href="ParkDataBase.css">
    </head>
    <body>
        <h1 class="title">公園データベース</h1>

        <div class=search>
            <form action=ParkList.php method=get>
            <input type=text size=20 name=keyword placeholder="キーワード"> 
            <input type=submit border=0 value="検索"><br>
        </div>

        <div class=add><a class=add href="ParkInput.php">公園を追加</a></div>

        <?php
        //ログイン関連
        //ユーザ名:user1 パスワード:pass1
        if (isset($_SESSION["user"])) {
            print '<div class="login"> ログイン中： ' . h($_SESSION["user"]) . ' 様 <a href="logout_form.php">ログアウト</a></div>';
          }
          else {
            print '<div class="login"><a  href="login_form.php">[ログイン]</a></div>';
          } 
        ?>

        <?php
        $prefecture_array = array(
            '北海道',
            '青森県',
            '岩手県',
            '宮城県',
            '秋田県',
            '山形県',
            '福島県',
            '茨城県',
            '栃木県',
            '群馬県',
            '埼玉県',
            '千葉県',
            '東京都',
            '神奈川県',
            '新潟県',
            '富山県',
            '石川県',
            '福井県',
            '山梨県',
            '長野県',
            '岐阜県',
            '静岡県',
            '愛知県',
            '三重県',
            '滋賀県',
            '京都府',
            '大阪府',
            '兵庫県',
            '奈良県',
            '和歌山県',
            '鳥取県',
            '島根県',
            '岡山県',
            '広島県',
            '山口県',
            '徳島県',
            '香川県',
            '愛媛県',
            '高知県',
            '福岡県',
            '佐賀県',
            '長崎県',
            '熊本県',
            '大分県',
            '宮崎県',
            '鹿児島県',
            '沖縄県'
        );
        if(isset($_GET['keyword']))      $keyword=$_GET['keyword'];
        
        $db = new PDO("sqlite:SQL\parklist.sqlite");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);           
        
        for ($i = 0; $i < 47; $i++) {
            
            print "<p class=prefecture>".$prefecture_array[$i]."</p>";
            if(isset($keyword)){
                $result=$db->query("SELECT * FROM parklist where parkname like '%".$keyword."%' OR pref like '%".$keyword."%' OR address like '%".$keyword."%' OR data like '%".$keyword."%' ");
                }else{
                $result=$db->query("SELECT * FROM parklist");
            }
            print "<p class=parkname>";
            while($row=$result->fetch()){
                if($row['pref']===$prefecture_array[$i])
                print '<a href="ParkInfo.php?id=' . h($row['id'] ) . '">'.h($row['parkname']).'</a>　　';
            }
            print "</p>";
            
        }
        ?>

    </body>
</html>