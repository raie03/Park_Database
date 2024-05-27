<?php
  session_start();
  if (!isset($_SESSION["user"])) {
    header("Location: login_form.php");
    exit;
    }
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
?>

<html>
<head> <meta charset='UTF-8'> <link rel="stylesheet" href="ParkDataBase.css"></head>
<body>
<div class="addAndEditForm">
<h2>公園の追加</h2>
<form action="ParkInput_submit.php" method = "get">
  <input name="parkname" placeholder="公園名" class="textbox"><br>

  <select name="pref" id="pref">
    <option value="">都道府県</option>
    <option value="北海道">北海道</option>
    <option value="青森県">青森県</option>
    <option value="岩手県">岩手県</option>
    <option value="宮城県">宮城県</option>
    <option value="秋田県">秋田県</option>
    <option value="山形県">山形県</option>
    <option value="福島県">福島県</option>
    <option value="茨城県">茨城県</option>
    <option value="栃木県">栃木県</option>
    <option value="群馬県">群馬県</option>
    <option value="埼玉県">埼玉県</option>
    <option value="千葉県">千葉県</option>
    <option value="東京都">東京都</option>
    <option value="神奈川県">神奈川県</option>
    <option value="新潟県">新潟県</option>
    <option value="富山県">富山県</option>
    <option value="石川県">石川県</option>
    <option value="福井県">福井県</option>
    <option value="山梨県">山梨県</option>
    <option value="長野県">長野県</option>
    <option value="岐阜県">岐阜県</option>
    <option value="静岡県">静岡県</option>
    <option value="愛知県">愛知県</option>
    <option value="三重県">三重県</option>
    <option value="滋賀県">滋賀県</option>
    <option value="京都府">京都府</option>
    <option value="大阪府">大阪府</option>
    <option value="兵庫県">兵庫県</option>
    <option value="奈良県">奈良県</option>
    <option value="和歌山県">和歌山県</option>
    <option value="鳥取県">鳥取県</option>
    <option value="島根県">島根県</option>
    <option value="岡山県">岡山県</option>
    <option value="広島県">広島県</option>
    <option value="山口県">山口県</option>
    <option value="徳島県">徳島県</option>
    <option value="香川県">香川県</option>
    <option value="愛媛県">愛媛県</option>
    <option value="高知県">高知県</option>
    <option value="福岡県">福岡県</option>
    <option value="佐賀県">佐賀県</option>
    <option value="長崎県">長崎県</option>
    <option value="熊本県">熊本県</option>
    <option value="大分県">大分県</option>
    <option value="宮崎県">宮崎県</option>
    <option value="鹿児島県">鹿児島県</option>
    <option value="沖縄県">沖縄県</option>
    </select>

  <input type="text" name = "address" placeholder="市区町村以降の住所" class="textbox" id="address"><br>
	<textarea name = "data" cols="40" rows="5" placeholder="その他情報" class="textbox"></textarea><br>
	<input type="submit" value="追加" class="button">

</form>

  <div class="addressSearch">
    ※郵便番号から住所検索ができます（任意）
    <input type="text" id="address-number" placeholder="郵便番号">
    <input type="button" id="button" value="検索">
  </div>

  </div>

<script>
		// ベースURL
		let apiURL = "https://zipcloud.ibsnet.co.jp/api/search?zipcode=";

		let button = document.getElementById("button");
		button.addEventListener("click", loadFile, false);

		function loadFile() {
			let addressNumber = document.getElementById("address-number").value;
			if (!addressNumber) {
				alert("郵便番号を入力してください。");
				return;
			}

			let URL = apiURL + addressNumber;

			let req = new XMLHttpRequest();
			req.open("GET", URL, true);
			req.responseType = "json";
			req.addEventListener("load", function (ev) {
				if (ev.target.status == 200) {
					showData(ev.target.response);
				} else {
					console.log("読み込めませんでした");
				}
			});
			req.send(null);
		}

		// 取得したデータを表示する
		function showData(response) {
			var address = response.results[0];
      document.getElementById("pref").value = address.address1;
			document.getElementById("address").value = address.address2 + address.address3;
		}
	</script>

</body>
</html>