<?php //db다룸
$conn=mysqli_connect('127.0.0.1', 'kwon', 'synergyit', 'synergy_db', '3306');
   if(!$conn){
     echo"connect fail....";
   }
    mysqli_set_charset($conn, 'utf8');
   $db=mysqli_select_db($conn , "synergy_db");
?>
