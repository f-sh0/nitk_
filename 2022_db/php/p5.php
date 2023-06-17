<!DOCTYPE html>
<html>
<head>
<title>WINE in stock</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

 </head>
<style>
.img1{
        margin:20px;
        width:36%;
        height:200px;
}
.box1{
       margin-top:10px;
       text-align:center;
       padding-bottom:30px;
      }

.button-width{
	width:100%;
}
</style>
<body>
<h1 class="display-5 text-center mt-5">wine in stock </h1>

<div class="container mt-3">
<?php
require_once("p1.php");

$reqStr="select wineID,picture,name,concat(country,' ',locality) as colo,color,price,status from wine inner join locality using(locaID) inner join wstatus using(stID) order by price";
$dbRecords=mysqli_query($dblocalhost,$reqStr) or die("Problem reading table: ".mysqli_error($dblocalhost));

$n=1;

print "<div class='row'>";
while($arrRecord=mysqli_fetch_array($dbRecords)){ 
  $bwID=$arrRecord["wineID"];
        
if($n % 6 == 0){
print "<div class='col-sm-2 box1'>";
print "<button type='submit' class='btn btn-outline-light button-width'>";
print "<img class='img1' src=".$arrRecord["picture"].">";
print "<br><strong class='text-danger'>". $arrRecord["name"]."</strong><br>";
print "<span class='text-dark'>". $arrRecord["colo"]."</span><br>";
print "<span class='text-dark'>". $arrRecord["color"]."</span><br>";
print  "<span class='text-dark'> &yen;".number_format($arrRecord["price"])."</span><br>";
print "<span class='text-dark'>". $arrRecord["status"]."</span><br>";
print "</button></form>";
print "</div></div><div class='row'>";
}
else if ($n % 6 > 0){
print "<div class='col-sm-2 box1'>";
print "<button type='submit' class='btn btn-outline-light button-width'>";
print "<img class='img1' src=".$arrRecord["picture"].">";
print "<br><strong class='text-danger'>". $arrRecord["name"]."</strong><br>";
print "<span class='text-dark'>". $arrRecord["colo"]."</span><br>";
print "<span class='text-dark'>". $arrRecord["color"]."</span><br>";
print  "<span class='text-dark'> &yen;".number_format($arrRecord["price"])."</span><br>";
print "<span class='text-dark'>". $arrRecord["status"]."</span><br>";
print "</button></form></div>";
}
 $n=$n+1;
}
mysqli_close($dblocalhost); 
?>

</div>
</div>
</body>
</html>

