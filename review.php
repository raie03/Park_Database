<?php
  session_start();
  if (!isset($_SESSION["user"])) {
    header("Location: login_form.php");
    exit;
    }

  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>レビュー投稿</title>
    <link rel="stylesheet" href="ParkDataBase.css">      
  </head>
  <body>
  <div class="Form">
    <h2>レビューを入力してください</h2>
    <form action="review_submit.php" method="get">
    お名前<br><input type="text" name="name" value=<?php print h($_SESSION['user']);?> class="textbox"></br>
    評価<br>
    <span class="star" id="stars">★</span>
    <select name="rate" id="value" class="select">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    <option value=5>5</option>
    </select><br>
    <textarea name="body" cols="40" rows="4" class="textbox" placeholder="コメントの入力"></textarea></br>
    <input type="hidden" name="park_id" value="<?php echo h($_GET['park_id']);?>">
    <input type=submit value="送信" class="button">
    </from>
  </div>

  <script>
    let starsNum = document.getElementById('stars');
    let select = document.getElementById('value');

    select.addEventListener('change', function() {
      starsNum.innerHTML = '';

      starsNum.innerHTML = '★';

      let value = parseInt(select.value, 10);

      for (let i = 0; i < value - 1; i++) {
        let stars = '';
        stars += '★';
        starsNum.innerHTML += stars;
      }
    });
  </script>

  </body>
</html>
