<!DOCTYPE html>
<html>
<head>
<title>WINE SET</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
</script>
</head>	
<style>

.img1{
        margin:20px;
        width:50%;
        height:200px;
}
.box1{
       border:1px solid lightgrey;
       margin:10px;
       text-align:center;
       padding-bottom:30px;
   }

.nameBox{
        margin:30px;
        text-align:center;
}
.setBox{
        float:left;
        margin:10px;
        text-align:center;
}

.rowBox{
 margin:10px;
}
</style>
<body>
<h1 class="display-5 text-center mt-5">wineSet in stock </h1>

<div class="container mt-3">

<?php
   require_once("p1.php");

   $reqStr="select wineSet.setID as 'setID', wineSet.name as 'Name',sum(price*quantity) as 'setPrice',status from wineSet inner join wstatus using(stID) inner join setDetail using(setID) inner join wine using(wineID) group by setID order by setPrice";
   
   $dbRecords=mysqli_query($dblocalhost,$reqStr) or die("Problem reading table: ".mysqli_error($dblocalhost));

   
     while($arrRecord=mysqli_fetch_array($dbRecords)){
      print "<form  action='p1001.php' method='post'>";
      print "<button type='submit' class='btn btn-outline-light text-dark mt-3' id='submit'>";
        $wsID=$arrRecord["setID"];
        print "<div class='row'>";           
        print "<div class='col-sm-3 nameBox'>";           
        print "<h5>". $arrRecord["Name"]."</h5>";
        print "<span class='text-dark'>&yen;". number_format($arrRecord["setPrice"])."</span><br>";
print "<span class='text-dark'>". $arrRecord["status"]."</span><br>";


   $offprice=$arrRecord["setPrice"];
   print "<input type='hidden' name='setid' value='".$wsID."'>";
   print "<input type='hidden' name='offprice' value='".$offprice."'>";
   print "</div>";
   
    $reqStr2="select picture, wineID, name, price, quantity from setDetail inner join wine using(wineID) where setID='$wsID'";

   $dbRec2=mysqli_query($dblocalhost,$reqStr2) or die("Problem reading table: ".mysqli_error($dblocalhost));


     while($arrRec2=mysqli_fetch_array($dbRec2)){
        print "<div class='col-sm-2 setBox'>";      
        print "<img class='img1 d-flex justify-content-center' src=".$arrRec2["picture"]."><br>";
        print  "<span class='text-dark'>wineID: ".$arrRec2["wineID"]."</span><br>";
        print  "<span class='text-danger'>".$arrRec2["name"]."</span><br>";
        print  "<span class='text-dark'>&yen;".number_format($arrRec2["price"])."</span><br>";
        print  "<span class='text-dark'>Qty: ".$arrRec2["quantity"]."</span></div>";
    } 
   print "</div>"; 
   print "</button></form>";
     }
   print "</div>";
      mysqli_close($dblocalhost);
    ?>
 </body>
</html>

