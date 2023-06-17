<html>
<head>
  <title>Bootstrap & php Example bs8</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
<?php
   $kcom = $_POST['mycomment'];

   if(isset($_POST['submit'])){
   if($kcom != NULL){
         print "<h5 class='text-danger'>入力したコメント</h5>";
         print "<p class='display-6'>".$kcom."</p>";
   		print "<img class='imgA' src='../../images/free2.jpeg'>";
	}else{
            print "<h1>コメントは入力していない。</h1>";
        }
   }
?>
</div>
</body>
</html>
