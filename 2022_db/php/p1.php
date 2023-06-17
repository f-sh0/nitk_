<?php
   $myID="db22";
   $myPass="Database-db22";
   $userDB="db22";

 

   $dblocalhost = mysqli_connect("localhost", $myID, $myPass, $userDB);

 

   if (mysqli_connect_errno()) {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

 

    mysqli_set_charset($dblocalhost,"utf8");
   //mysqli_close($dblocalhost);
   ?>


