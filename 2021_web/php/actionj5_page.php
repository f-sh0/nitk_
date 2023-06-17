<html>
<head>
  <title>BadPierrot OfficialTicketSite PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
<?php
	$date = $_POST['mycheckin'];
	$live = $_POST['live'];
	$person = $_POST['persons'];
   $name = $_POST['phase1'];
   $mail = $_POST['mail'];
   $tel = $_POST['tel'];
   $q2 = $_POST['member'];
   $q3 = $_POST['covit'];
   $q4 = $_POST['requests'];
	$q1 = implode(", ", $_POST["optbox"]);

   if(isset($_POST['submit'])){
   if($date != NULL && $live != '選択なし' && $person != '選択なし' && $name != NULL && $mail != NULL && $tel != NULL){
         print "<h2 class='text-danger'>BadPierrot 1stTour 受付完了. </h2>";
			print "<h class='display-6'>$name</h>";
			print "<h class='display-6'>さん、ようこそ.</h>";
			print "<br><br><h4>以下の内容で受付を行いました.  mailに受付完了のメールをお送りしております.</h4>";
			print "<br><h4>十分にお気をつけて当日お越しくださいませ.</h4>";
         print "<br><br><br><h3 class='text-danger'>受付内容</h3>";
			print "<br>日時: ";
			print "<p class='display-6'>$date</p>";
			print "<br>会場: ";
			print "<p class='display-6'>$live</p>";
			print "<br>人数: ";
			print "<p class='display-6'>$person</p>";
			print "<br>代表者メールアドレス";
			print "<p class='display-6'>$mail</p>";
			print "<br>代表者電話番号";
			print "<p class='display-6'>$tel</p>";
   	
         print "<br><br><br><h3 class='text-danger'>アンケート内容</h3>";
			print "<br>Q1: 今回のツアー開催を何で知りましたか?";
			print "<p class='display-6'>$q1</p>";
			print "<br>Q2: BadPierrotの中で、あなたが特に好きなメンバー(推し)がいれば教えてください.";
			print "<p class='display-6'>$q2</p>";
			print "<br>Q3: 新型コロナウイルス感染症のワクチン接種状況について";
			print "<p class='display-6'>$q3</p>";
			print "<br>お問い合わせフォーム";
			print "<p class='display-6'>$q4</p>";	

	}else{
         print "<h3>入力した内容が正しくありません. (入力ミス・パスワードの不一致の可能性)</h3>";
        }
   }
?>
</div>
</body>
</html>
