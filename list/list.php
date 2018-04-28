<?php
$conn=mysqli_connect('localhost', 'root', '771029', 'test_table', '3307');
$db=mysqli_select_db($conn , "test_table");
if($db)
 echo "db 연결성공";
else
 echo "db 연결 실패";
?>
