<?php
 $con=mysql_connect("127.0.0.1","root","540132");
 mysql_select_db("test",$con);
 function query($str)
 {
     $reuslt=mysql_query($str);
     if(!$reuslt)
     {
         return false;
     }
     else {
         return $reuslt;
     }
 }


?>