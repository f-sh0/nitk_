<?php
  require_once("p1.php");
 // $reqStr="show tables";
  $reqStr="desc wine";

 

  //$reqStr="select * from wine order by price desc";

 

  $dbRecords=mysqli_query($dblocalhost,$reqStr)or die("Problem reading table: ".mysqli_error($dblocalhost));

 

print "<table border=1>";
print "<caption>".WINE."</caption>";
 while($arrRecord=mysqli_fetch_row($dbRecords)){
     print "<tr>";
     for($i=0;$i<count($arrRecord);$i++){
        print "<td>". $arrRecord[$i]."</td>";
       }
       print "</tr> ";
 }
  print "</table>";
    mysqli_close($dblocalhost);
 ?>
