<?php
require_once("p1.php");
//$reqStr="desc wine";
//$reqStr="select wineID, name, color, price from wine order by price desc";
$reqStr="select * from wine order by price desc";

$dbRec=mysqli_query($dblocalhost,$reqStr)or die("Problem reading table: ".mysqli_error($dblocalhost));

 while($arrRecord=mysqli_fetch_row($dbRec)){
            echo "<p>".$arrRecord[0]." ";
            echo $arrRecord[1]." ";
            echo $arrRecord[2]." ";
            echo $arrRecord[3]." ";
            echo $arrRecord[4]." ";
            echo $arrRecord[5]." ";
            echo $arrRecord[6]." ";
            echo $arrRecord[7]." ";
            echo $arrRecord[8]."</p> ";
         }
            mysqli_close($dblocalhost);
?>
