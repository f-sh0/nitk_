<!DOCTYPE html>
<html>
<head>
  <title>login confirm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
.imgA{
 width:300px;
 height:200px;
 margin:10px 100px;
}
</style>

<body>

<div class="container mt-3">
<?php
   $kemail = $_POST['email'];
   $kpswd = $_POST['pswd'];
   

   $ID = "hello@where.com";
   $pass = "new-world"; 

   if($kemail == $ID && $kpswd == $pass){
	   header("Location:../JavaScript/j2.html");
   }else{
            print "<p class='display-6'>認証失敗.</p>";
   }
	    
?>

</div>

</body>
</html>
