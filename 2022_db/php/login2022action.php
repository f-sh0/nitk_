<!DOCTYPE html>
<html>
<head>
  <title>login action</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">

<?php
   $myid = $_POST['email'];
   $mypw = $_POST['pswd'];

  //get from DB  
   if(isset($_POST['submit'])){
   if($myid != NULL && $mypw != NULL){
    require_once("p1.php");

    $reqStr="select checkSidpw('".$myid."','".$mypw."')";
    //$reqStr="select checkSidpw('wineShop2022@knct.jp','2023test')";
    $dbRecords=mysqli_query($dblocalhost,$reqStr)or die("Problem reading table: ".mysqli_error($dblocalhost));
  
    while($arrRecord=mysqli_fetch_row($dbRecords)){
       if($arrRecord[0]==1){
        require_once("manager.php");
       }
       elseif($arrRecord[0]== -1){
            print "<h1>Certification Failed.</h1>";
            mysqli_close($dblocalhost);
   	}
  }
  }
}    
?>

</div>
</body>
</html>
