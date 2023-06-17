<html>
<head>
<title>Display a table</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style>
     caption{
          caption-side:top;
          text-align:center;
          font-size:larger;
          font-weight:bold;
          color:black;
      }
      #line1 {background-color:#88aaff; color:#ffffff;}
      #top{
        margin-top:160px;
      }
</style>
</head>
<body>

<div id="top" class="container">
<?php
  require_once("p1.php");

  $kname = $_POST['aname'];

  $reqStr="desc ".$kname;

  $dbRecords=mysqli_query($dblocalhost,$reqStr)or die("Problem reading table: ".mysqli_error($dblocalhost));

 print "<table class='table table-striped'>
 <caption>".$kname."</caption>
 <thead>
 <tr id='line1'>";

 while($arrRecord=mysqli_fetch_row($dbRecords)){
        print "<th>". $arrRecord[0]."</th>";
 }
  print "</tr></thead>";
  
  $reqStr1="select * from ".$kname;

  $dbRec1=mysqli_query($dblocalhost,$reqStr1)or die("Problem reading table: ".mysqli_error($dblocalhost));

 while($arrRec1=mysqli_fetch_row($dbRec1)){
     print "<tr>";  
     for($i=0;$i<count($arrRec1);$i++){
        print "<td>". $arrRec1[$i]."</td>";
       }
       print "</tr> ";
 }
  print "</tbody></table>"; 
    
   mysqli_close($dblocalhost);
 ?>
   </div>
  </body>
 </html>

