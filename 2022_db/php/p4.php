<html>
<head>
<title>WINE </title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-12">

<?php
  require_once("p1.php");
  
  $reqStr1="desc wine";
  $reqStr="select * from wine order by price desc";
  
  $dbRecords=mysqli_query($dblocalhost,$reqStr)or die("Problem reading table: ".mysqli_error($dblocalhost));
     
     print "<table class='table table-striped table-bordered table-hover align-middle text-center caption-top'>
     <caption><h1 class='display-5 text-center'>WINE<h1></caption>
        <thead>
        <tr class='table-primary'>";
       
  $dbRec1=mysqli_query($dblocalhost,$reqStr1)or die("Problem reading table: ".mysqli_error($dblocalhost));
        
        while($arrRecord1=mysqli_fetch_row($dbRec1)){
                 print  "<th>".$arrRecord1[0]."</th>";
        }
       print "</tr>
              </thead>
              <tbody>";
    
    while($arrRecord=mysqli_fetch_row($dbRecords)){
         print "<tr>";  
         for($i=0;$i<count($arrRecord);$i++) 
           print "<td>". $arrRecord[$i]."</td>";  
           print "</tr> ";
        }
          
        print "</tbody></table>";
        mysqli_close($dblocalhost);
  ?>
  </div>
  </div>
  </div>
 </body>
</html>

